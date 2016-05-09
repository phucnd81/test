<?php
class JsTreeBehavior extends CActiveRecordBehavior
{
	public $id	= 'id';	
	public $lft = 'left';
	public $rgt = 'right';
	public $level = 'level';	
	public $position = 'position';
	public $parent_id  = 'parent_id';
	public $name  = 'name';
	public $type  = 'type';	
	
	public function initTree() {
		$owner = $this->getOwner();
		$tableName=$owner->tableName();		
		//$owner->getDbConnection()->createCommand("TRUNCATE TABLE `{$tableName}`")->execute();		
		$owner->setIsNewRecord(true);
		
		($domain = Yii::app()->user->getDomain()) ? $domain : "Public";
		
		$owner->setAttribute('display_url', $domain);
		$owner->setAttribute($this->name, $domain);
		$owner->setAttribute($this->position, 1);
		$owner->setAttribute($this->parent_id, 0);
		
		
		$owner->beforeSave(null);
		$owner->save();
	}
	
	public function node($id=null) {
		$owner=$this->getOwner();
		if ($id===null) {
			$condition="`$this->parent_id` = 0";
		} else {
			$condition="`$this->id` = '$id'";
		}
		return $owner->find($condition);
	}
	
	public function roots($force=false) {
		$owner = $this->getOwner();

		$criteria=new CDbCriteria;
		$criteria->order = "`{$this->lft}` ASC";
		$criteria->condition = "`$this->parent_id` = 0";
		if ($force===true) {
			$roots=$owner->findAll($criteria);
			if (!$roots && $force===true) {
				$this->initTree();
				return $this->roots($force);
			}
			return $owner->findAll($criteria);
		} else {
			$root=$owner->find($criteria);
			if ($root) {
				$criteria->condition="`$this->parent_id` = '{$root->getAttribute($this->id)}'";
				return $owner->findAll($criteria);
			} else {
				return array();
			}
		}
	}
	
	public function getPath($showRoot=true) {
		$owner = $this->getOwner();

		$criteria = new CDbCriteria;
		$criteria->order = "`{$this->lft}` ASC";
		$criteria->condition = "`$this->lft` < '{$owner->getAttribute($this->lft)}' AND `$this->rgt` > '{$owner->getAttribute($this->rgt)}'";
		if ($showRoot=== false) {
			$criteria->addCondition("`$this->parent_id` <> 0");
		}
		return $owner->findAll($criteria);
	}
	
	public function getPathId($showRoot=true) {
		$owner=$this->getOwner();
		$tableName=$owner->tableName();
		
		$cond = '';
		if($showRoot=== false) {
			$cond = "`$this->parent_id` <> 0";
		}
																
		return $owner->getDbConnection()->createCommand("SELECT id 
														 FROM $tableName 
														 WHERE 	`$this->lft` <= '{$owner->getAttribute($this->lft)}' AND 
														 		`$this->rgt` >= '{$owner->getAttribute($this->rgt)}' {$cond}")->queryColumn();
	}
	
	public function getChildren($direct = true) {
		$owner = $this->getOwner();

		$criteria = new CDbCriteria;
		$criteria->order = "`{$this->lft}` ASC";

		if($direct === true){
			$criteria->condition = "`$this->parent_id` = '{$owner->getAttribute($this->id)}'";
		}else{
			$criteria->condition= "`$this->lft` > '{$owner->getAttribute($this->lft)}' AND `$this->rgt` < '{$owner->getAttribute($this->rgt)}'";
		}

		return $owner->findAll($criteria);
	}
	
	public function getChildrenId() {
		$owner=$this->getOwner();
		$tableName=$owner->tableName();
		return $owner->getDbConnection()->createCommand("SELECT id FROM $tableName WHERE `$this->lft` >= '{$owner->getAttribute($this->lft)}' AND `$this->rgt` <= '{$owner->getAttribute($this->rgt)}'")->queryColumn();
	}

	public function beforeSave($event){	
		$owner = $this->getOwner();
		
		if($owner->getIsNewRecord()){ 
			$owner->insert_by = Yii::app()->user->getId(); 
			$owner->insert_on = date('Y-m-d H:i:s'); 
		} 
		
		$owner->update_by = Yii::app()->user->getId();
		$owner->update_on = date('Y-m-d H:i:s');
		
		if ($owner->getIsNewRecord() || !$owner->getAttribute($this->id)) {//if create
			$parent_id = $owner->getAttribute($this->parent_id);
			if ($parent_id) {
				$parent=$owner->find("`$this->id` = '$parent_id'");
				if ($parent===null) {
					$owner->addError($this->parent_id, 'Parent node not exist');
					$event->isValid=false;
				} else {
					// update left and right values
					$owner->updateAll(array($this->lft=>new CDbExpression("`$this->lft` + 2")),"`$this->lft` >= '{$parent->getAttribute($this->rgt)}'");
					$owner->updateAll(array($this->rgt=>new CDbExpression("`$this->rgt` + 2")),"`$this->rgt` >= '{$parent->getAttribute($this->rgt)}'");
					//set values
					$owner->setAttribute($this->level, $parent->getAttribute($this->level)+1);
					$owner->setAttribute($this->lft, $parent->getAttribute($this->rgt));
					$owner->setAttribute($this->rgt, $parent->getAttribute($this->rgt)+1);
				}
			} else {
				if ($owner->count("`$this->parent_id` = 0")) {
					$owner->addError($this->parent_id, 'Only allowed one root node'.$parent_id);
					$event->isValid=false;
				} else {
					$tableName=$owner->tableName();
					$maxRight=$owner->getDbConnection()->createCommand("SELECT MAX(`$this->rgt`) FROM $tableName")->queryScalar();

					$owner->setAttribute($this->level,0);
					$owner->setAttribute($this->lft,$maxRight+1);
					$owner->setAttribute($this->rgt,$maxRight+2);
				}
			}
		} else {//if update
			//remain old data
			$old=$owner->find("`$this->id` = '".$owner->getAttribute($this->id)."'");
			if ($owner->getAttribute($this->parent_id) != $owner->getAttribute($this->id) && $owner->getAttribute($this->parent_id) != $old->getAttribute($this->parent_id)) {
				if ($old->getAttribute($this->parent_id) && !$owner->getAttribute($this->parent_id)) {
					$owner->addError($this->parent_id,'Only allowed one root node');
					$event->isValid=false;
				} else {
					$parent=$owner->find("`$this->id` = '".$owner->getAttribute($this->parent_id)."'");
					if ($parent===null) {
						$owner->addError($this->parent_id,'Parent node not exist');
						$event->isValid=false;
					} elseif ($owner->getAttribute($this->lft)<$parent->getAttribute($this->lft) && $owner->getAttribute($this->rgt)>$parent->getAttribute($this->rgt)) {
						$owner->addError($this->parent_id,'Parent node not allowed,because this node is your children');
						$event->isValid=false;
					} else {						
						$oldParent=$owner->find("`$this->id` = '".$old->getAttribute($this->parent_id)."'");						
						$lvl=$parent->getAttribute($this->level)-$oldParent->getAttribute($this->level);						
						$nodeChildren=$owner->findAll("`$this->lft`>={$owner->getAttribute($this->lft)} AND `$this->rgt`<={$owner->getAttribute($this->rgt)}");
						$nodeChildrenIds=array();
						foreach ($nodeChildren as $row) {
							$nodeChildrenIds[]=$row->id;
						}
						$nodeChildrenIds=implode(',',$nodeChildrenIds);
						$value=$owner->getAttribute($this->rgt)-$owner->getAttribute($this->lft);
						
						if ($parent->getAttribute($this->rgt)>$owner->getAttribute($this->rgt)) {
							$owner->updateAll(array($this->lft=>new CDbExpression("`$this->lft`-$value-1")),"`$this->lft`>{$owner->getAttribute($this->rgt)} AND `$this->rgt`<={$parent->getAttribute($this->rgt)}");
							$owner->updateAll(array($this->rgt=>new CDbExpression("`$this->rgt`-$value-1")),"`$this->rgt`>{$owner->getAttribute($this->rgt)} AND `$this->rgt`<{$parent->getAttribute($this->rgt)}");
							$value=$parent->getAttribute($this->rgt)-$owner->getAttribute($this->rgt)-1;
							$owner->updateAll(array($this->lft=>new CDbExpression("`$this->lft`+$value"),$this->rgt=>new CDbExpression("`$this->rgt`+$value"),$this->level=>new CDbExpression("`$this->level`+$lvl")),"`$this->id` IN ($nodeChildrenIds)");
						} else {							
							$owner->updateAll(array($this->lft=>new CDbExpression("`$this->lft`+$value+1")),"`$this->lft`>{$parent->getAttribute($this->rgt)} AND `$this->lft`<{$owner->getAttribute($this->lft)}");
							$owner->updateAll(array($this->rgt=>new CDbExpression("`$this->rgt`+$value+1")),"`$this->rgt`>={$parent->getAttribute($this->rgt)} AND `$this->rgt`<{$owner->getAttribute($this->lft)}");
							$value=$owner->getAttribute($this->lft)-$parent->getAttribute($this->rgt);
							$owner->updateAll(array($this->lft=>new CDbExpression("`$this->lft`-$value"),$this->rgt=>new CDbExpression("`$this->rgt`-$value"),$this->level=>new CDbExpression("`$this->level`+$lvl")),"$this->id IN ($nodeChildrenIds)");
						}
						$node=$owner->findByPk($owner->getAttribute($this->id));
						$owner->setAttribute($this->level,$node->getAttribute($this->level));
						$owner->setAttribute($this->lft,$node->getAttribute($this->lft));
						$owner->setAttribute($this->rgt,$node->getAttribute($this->rgt));
					}
				}
			}
		}
	}
	
	public function afterDelete($event) {
		$owner = $this->getOwner();

		$left=$owner->getAttribute($this->lft);
		$right=$owner->getAttribute($this->rgt);
		$span=$right-$left+1;
		$owner->deleteAll("`$this->lft` > '$left' AND `$this->rgt` < '$right'");
        $owner->updateAll(array($this->lft=>new CDbExpression("`$this->lft` - {$span}")),"`$this->lft` > $right");
        $owner->updateAll(array($this->rgt=>new CDbExpression("`$this->rgt` - {$span}")),"`$this->rgt` > $right");
	}	
	
	public function move($ref_id, $position, $copy){
		$owner = $this->getOwner();
		if((int)$ref_id === 0 || (int)$owner->getAttribute($this->id) === 1) { return false; }
		
		$shift = 2;		
		$sql = array();
		$children = array();
		$node_id = array(-1);
		$ref_children = array();		
		$tableName = $owner->tableName();		
			
		if($node = $this->node($owner->getAttribute($this->id))){		// Node data
			$children = $node->getChildren();	// Node children
			$node_id  = $node->getChildrenId();		
		
			if(in_array($ref_id, $node_id)) return false;
			$shift = $node->getAttribute($this->rgt) - $node->getAttribute($this->lft) + 1;
			
		}
		
		if($ref_node = $this->node($ref_id)){	// Ref node data
			$ref_children = $ref_node->getChildren();// Ref node children
		}
		
		if($position >= count($ref_children)){
			$position = count($ref_children);
		}
		
		if($node && empty($copy)) {
			$sql[] = "	UPDATE `{$tableName}` SET `{$this->position}` = `{$this->position}` - 1 
						WHERE `{$this->parent_id}` = {$node->parent_id} AND `{$this->position}` > {$node->position}";
						
			$sql[] = "	UPDATE `{$tableName}` SET `{$this->lft}` = `{$this->lft}` - {$shift} 
						WHERE `{$this->lft}` > {$node->getAttribute($this->rgt)}";
						
			$sql[] = "	UPDATE `{$tableName}` SET `{$this->rgt}` = `{$this->rgt}`  - {$shift} 
						WHERE `{$this->rgt}` > {$node->getAttribute($this->lft)} AND `{$this->id}` NOT IN (".implode(",", $node_id).")";
		}
		
		$sql[] = "	UPDATE `{$tableName}` SET `{$this->position}` = `{$this->position}` + 1 
					WHERE `{$this->parent_id}` = {$ref_id} AND `{$this->position}` >= {$position} " . 
					($copy ? "" : " AND `{$this->id}` NOT IN (".implode(",", $node_id).") ");
		
		$ref_ind = $ref_id === 0 ? (int)$ref_children[count($ref_children) - 1]->rgt + 1 : (int)$ref_node->rgt;
		$ref_ind = max($ref_ind, 1);

		$self = ($node && !$copy && (int)$node->parent_id == $ref_id && $position > $node->position) ? 1 : 0;
		foreach($ref_children as $c) {
			if($c->position - $self == $position) {
				$ref_ind = (int)$c->lft;
				break;
			}
		}
		if($node !== false && !$copy && $node->getAttribute($this->lft) < $ref_ind) {
			$ref_ind -= $shift;
		}	
		
		$sql[] = "	UPDATE `{$tableName}` SET `{$this->lft}` = `{$this->lft}` + {$shift} 
					WHERE `{$this->lft}` >= {$ref_ind} " . 
					( $copy ? "" : " AND `{$this->id}` NOT IN (".implode(",", $node_id).") ");
								
		$sql[] = "	UPDATE `{$tableName}` SET `{$this->rgt}` = `{$this->rgt}` + {$shift} 
					WHERE `{$this->rgt}` >= {$ref_ind} " . 
					( $copy ? "" : " AND `{$this->id}` NOT IN (".implode(",", $node_id).") ");

		$ldif = $ref_id == 0 ? 0 : $ref_node->level + 1;
		$idif = $ref_ind;	
		
		if($node) {
			$ldif = $node->level - ($ref_node->level + 1);
			$idif = $node->getAttribute($this->lft) - $ref_ind;
			if($copy) {
				$sql[] = "	INSERT INTO `{$tableName}` (`{$this->parent_id}`, 
														`{$this->position}`, 
														`{$this->lft}`, 
														`{$this->rgt}`, 
														`{$this->level}` , 
														`{$this->name}`,
														`insert_by`,
														`insert_on`,
														`update_by`,
														`update_on`)
							SELECT {$ref_id}, 
									`{$this->position}`, 
									`{$this->lft}` - (".($idif + ($node->getAttribute($this->lft) >= $ref_ind ? $shift : 0))."), 
									`{$this->rgt}` - (".($idif + ($node->getAttribute($this->lft) >= $ref_ind ? $shift : 0))."), 
									`{$this->level}` - ({$ldif}), 
									`{$this->name}`,
									`insert_by`,
									`insert_on`,
									`update_by`,
									`update_on`
							FROM `{$tableName}` 
							WHERE `{$this->id}` IN (".implode(",", $node_id).") 
							ORDER BY `{$this->level}` ASC";
			}
			else {
				$sql[] = "	UPDATE `{$tableName}` SET `{$this->parent_id}` = {$ref_id}, `{$this->position}` = {$position} 
							WHERE `{$this->id}` = {$owner->getAttribute($this->id)}";
							
				$sql[] = "	UPDATE `{$tableName}` SET `{$this->lft}` = `{$this->lft}` - ({$idif}), `{$this->rgt}` = `{$this->rgt}` - ({$idif}), `{$this->level}` = `{$this->level}` - ({$ldif}) 
							WHERE `{$this->id}` IN (".implode(",", $node_id).") ";
			}
		}else{
			$user_id = Yii::app()->user->getId();
			$sql[] = "	INSERT INTO `{$tableName}` (`{$this->parent_id}`, 
													`{$this->position}`, 
													`{$this->lft}`, 
													`{$this->rgt}`, 
													`{$this->level}`,
													`insert_by`,
													`insert_on`,
													`update_by`,
													`update_on` )  
						VALUES ({$ref_id}, 
								{$position}, 
								{$shift}, 
								{($shift + 1)}, 
								{$ldif},'{$user_id}', NOW(), '{$user_id}', NOW())";
		}
		
		foreach($sql as $q) { 
			$owner->getDbConnection()->createCommand($q)->execute();
		}
		
		$ind = Yii::app()->db->getLastInsertID();
		if($copy) $this->fix($ind, $position);
		return !$node || $copy ? $ind : true;
	}
	
	function fix($id, $position) {
		$owner = $this->getOwner();
		$tableName = $owner->tableName();
	
		if($node = $this->node($id)){
			$children = $node->getChildren(false);
	
			$map = array();			
			for($i = $node->getAttribute($this->lft) + 1; $i < $node->getAttribute($this->rgt); $i++) {
				$map[$i] = $id;
			}
			foreach($children as $c) {
				if((int)$c->id == (int)$id) {
					$sql = "UPDATE `{$tableName}` SET `{$this->position}` = {$position} WHERE `{$this->id}` = {$c->id}";
					$owner->getDbConnection()->createCommand($q)->execute();
					continue;
				}
				
				$parent_id = $map[(int)$c->lft];
				$sql = "UPDATE `{$tableName}` SET `{$this->parent_id}` = {$parent_id} WHERE `{$this->id}` = {$c->id}";				
				$owner->getDbConnection()->createCommand($sql)->execute();
				
				for($i = $c->lft + 1; $i < $c->rgt; $i++) {
					$map[$i] = $c->id;
				}
			}
		}		
	}
}