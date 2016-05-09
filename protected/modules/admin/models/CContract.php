<?php
/**
 * This is the model class for table "contract".
 *
 * The followings are the available columns in table 'contract':
 * @property integer $id
 * @property string $licence_key
 * @property string $openid
 * @property string $record_type
 * @property string $start_date
 * @property string $end_date
 * @property string $create_date
 */
class CContract extends BaseContract
{
    public $telephone="";
	public $pageSize=10;
	public $name="";
	public $search_usr_null = 0;
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('licence_key, start_date, create_date', 'required'),
			array('licence_key', 'length', 'max'=>20),
			array('record_type', 'length', 'max'=>2),
			array('openid, end_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, licence_key, openid, record_type, start_date, end_date, create_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'licence_key' => 'Licence Key',
			'openid' => 'Openid',
			'record_type' => 'Record Type',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'create_date' => 'Create Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
    public function searchDate($record_type='01'){
        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('licence_key',$this->licence_key,true);
        $criteria->compare('openid',$this->openid,true);
        $criteria->compare('record_type',$this->record_type,true);
        //$criteria->compare('start_date',$this->start_date,true);
        //$criteria->compare('end_date',$this->end_date,true);
        $criteria->compare('create_date',$this->create_date,true);
        if($this->start_date){
            $criteria->addCondition("(to_char(start_date, 'YYYY/MM') <= '".$this->start_date."' OR start_date IS NULL)");
        }
        if($this->end_date){
            $criteria->addCondition("(to_char(end_date, 'YYYY/MM') >= '".$this->end_date."' OR end_date IS NULL)");
        }
		
        $criteria->addCondition("record_type = '".$record_type."'");
        if($record_type =="02"){
            $criteria->addCondition(" end_date is not null ");
        }
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>$this->pageSize//Yii::app()->request->getParam('page_size')
            ),
            'sort'=>array('defaultOrder'=>'start_date ASC')
        ));
    }
    public function searchUsers(){
        $criteria=new CDbCriteria;
        $criteria->compare('id',$this->id);
        $criteria->compare('licence_key',$this->licence_key,true);
        $criteria->compare('openid',$this->openid,true);
        $criteria->compare('record_type',$this->record_type,true);
        //$criteria->compare('start_date',$this->start_date,true);
        //$criteria->compare('end_date',$this->end_date,true);
        $criteria->compare('create_date',$this->create_date,true);
        if($this->start_date ){
            $criteria->addCondition( "to_char(start_date, 'YYYY/MM/DD') >= '".$this->start_date."'");
        }
        if($this->end_date){
            $criteria->addCondition( "to_char(end_date, 'YYYY/MM/DD') <= '".$this->end_date."'");
        }
        /*if($this->telephone){
            $criteria->addCondition("tel1 like '%".$this->telephone."%' or mobile1 like '%".$this->telephone."%' ");
        }*/
    	if ($this->telephone){
    		$criteria->addCondition("tel1 like '%".$this->telephone."%' OR tel2 like '%".$this->telephone."%' 
    							OR mobile1 like '%".$this->telephone."%' OR mobile2 like '%".$this->telephone."%' ");
    	}
    	if($this->name){
        	$criteria->addCondition("(first_kana1 is not null and last_kana1 is not null and 
        							(first_kana1 || last_kana1) like '%".$this->name."%' ) OR
        							(first_kana2 is not null and last_kana2 is not null and 
        							(first_kana2 || last_kana2) like '%".$this->name."%' )");
        }
    	if ($this->zip_code1){
    		$substr_zip1 = substr($this->zip_code1, 0, 3);
    		$criteria->addCondition("zip_code1 like '".$substr_zip1."%' ");
    	}
    	if ($this->licence_key){
    		$criteria->addCondition("licence_key like '%".$this->licence_key."%' ");
    	}
		
		if ($this->Zaitaku_sub){
    		$criteria->addCondition('"Zaitaku_sub" = \''.$this->Zaitaku_sub.'\'');
    	}
        
		if ($this->Conf_1_status){
    		$criteria->addCondition('"Conf_1_status" '.$this->Conf_1_status);
    	}
		
		if ($this->Conf_2_status){
    		$criteria->addCondition('"Conf_2_status" '.$this->Conf_2_status);
    	}
		
		if ($this->Zaitaku_conf){
    		$criteria->addCondition('"Zaitaku_conf" = \''.$this->Zaitaku_conf.'\'');
    	}
		
		if ($this->ticket_id){
    		$criteria->addCondition("ticket_id like '%".$this->ticket_id."%' ");
    	}
		
       if ( $this -> search_usr_null == 0 ){
	   		$criteria->addCondition("start_date is not null ");
		}
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>$this->pageSize//Yii::app()->request->getParam('page_size')
            ),
            'sort'=>array('defaultOrder'=>'start_date DESC')
        ));
    }
    public function sql_users_export_csv(){
    	
        /*$sql = "SELECT * FROM contract WHERE start_date is not null";
        if($this->start_date) {
            $sql.=" and to_char(start_date, 'YYYY/MM/DD') >= '".$this->start_date."'";
        }
        if($this->end_date) {
            $sql.=" and to_char(end_date, 'YYYY/MM/DD') <= '".$this->end_date."'";
        }
        if($this->telephone){
            $sql.=" and (tel1 like '%".$this->telephone."%' or mobile1 like '%".$this->telephone."%' )";
        }
        $sql .=" ORDER BY start_date ASC";
        return $sql;
        */
        //$sql = "SELECT * FROM contract Where start_date is not null";
		$sql = "FROM contract Where start_date is not null";
        if (!$this->start_date && !$this->end_date && !$this->telephone && !$this->name &&
        	!$this->zip_code1 && !$this->licence_key && !$this->Zaitaku_sub && !$this->Conf_1_status && 
			!$this->Conf_2_status && !$this->Zaitaku_conf){
        		//nothing to do here;
        	}
		else{
			if ($this->start_date){
				$sql.=" And (start_date is not null)".
					" And (to_char(start_date, 'YYYY/MM/DD') >= '".$this->start_date."' )";
				
			}
			if ($this->end_date){
				$sql.=" And (end_date is not null)".
					" And (to_char(end_date, 'YYYY/MM/DD') <= '".$this->end_date."')";
			}
			if ($this->telephone){
				$sql.=" And (tel1 like '%".$this->telephone."%' or tel2 like '%".$this->telephone."%' 
							or mobile1 like '%".$this->telephone."%' or mobile2 like '%".$this->telephone."%' )";
			}
			if ($this->name){
				
				$sql.=" And ((first_kana1 is not null and last_kana1 is not null and 
        					(first_kana1 || last_kana1) like '%".$this->name."%' ) OR
        					(first_kana2 is not null and last_kana2 is not null and 
        					(first_kana2 || last_kana2) like '%".$this->name."%' ))";
				
			}
			if ($this->zip_code1){
				$substr_zip1 = substr($this->zip_code1, 0, 3);
				$sql.=" And (zip_code1 like '".$substr_zip1."%') ";
			}
			if ($this->licence_key){
				$sql.=" And (licence_key like '%".$this->licence_key."%') ";
				
			}
			
			if ($this->Zaitaku_sub){
				$sql.=" And (\"Zaitaku_sub\" = '".$this->Zaitaku_sub."') ";
			}
        
			if ($this->Conf_1_status){
				$sql.=" And (\"Conf_1_status\" ".$this->Conf_1_status.") ";
			}
		
			if ($this->Conf_2_status){
				$sql.=" And (\"Conf_2_status\" ".$this->Conf_2_status.") ";
			}
		
			if ($this->Zaitaku_conf){
				$sql.=" And (\"Zaitaku_conf\" = '".$this->Zaitaku_conf."') ";
			}
			
		}
		return $sql;
    }
    public function sql_export_csv($record_type='01'){
        $sql = "SELECT * FROM contract WHERE record_type = '".$record_type."'";
        if($this->start_date) {
            $sql.=" and (to_char(start_date, 'YYYY/MM') <= '".$this->start_date."' OR start_date IS NULL)";
        }
        if($this->end_date) {
            $sql.=" and (to_char(end_date, 'YYYY/MM') >= '".$this->end_date."' OR end_date IS NULL)";
        }
        if($record_type =="02"){
            $sql.=" and end_date is not null ";
        }
        $sql .=" ORDER BY start_date ASC";		
		
        return $sql;

    }
    public function data_query($sql)
    {
        $Command = Yii::app()->db->createCommand($sql);
        $list = $Command->queryAll();
        return $list;
    }
	
	public function update_status($detailID, $statusA, $contact_dateA, $statusB, $contact_dateB, $statusC, $contact_dateC){
		$contact_dateA = trim($contact_dateA);
		$contact_dateB = trim($contact_dateB);
		$contact_dateC = trim($contact_dateC);
		$sql = "UPDATE contract"
				." SET \"Zaitaku_conf\" = :zaitaku_conf, \"Conf_1_datetime\" = :conf_1_datetime, \"Conf_1_status\" = :conf_1_status, \"Conf_2_datetime\" = :conf_2_datetime, \"Conf_2_status\" = :conf_2_status, \"Conf_3_datetime\" = :conf_3_datetime, \"Conf_3_status\" = :conf_3_status WHERE id = :id";
		$parameters = array( ':id' => $detailID,
							 );
		if($statusA == 4 || $statusB == 4){
			$parameters[':zaitaku_conf'] = '1';
		} else {
			$parameters[':zaitaku_conf'] = null;
		}
		if($statusA != null && $contact_dateA != null){
			$parameters[':conf_1_datetime'] = $contact_dateA;
			$parameters[':conf_1_status'] = $statusA;
		} else {
			$parameters[':conf_1_datetime'] = null;
			$parameters[':conf_1_status'] = null;
		}
		if($statusB != null && $contact_dateB != null){
			$parameters[':conf_2_status'] = $statusB;
			$parameters[':conf_2_datetime'] = $contact_dateB;
		} else {
			$parameters[':conf_2_status'] = null;
			$parameters[':conf_2_datetime'] = null;
		}
		
		if($statusC != null && $contact_dateC != null){
			$parameters[':conf_3_status'] = $statusC;
			$parameters[':conf_3_datetime'] = $contact_dateC;
		} else {
			$parameters[':conf_3_status'] = null;
			$parameters[':conf_3_datetime'] = null;
		}
		return Yii::app()->db->createCommand($sql)->execute($parameters);
	}
	
	public function reset_status($detailID){
		$sql = "UPDATE contract"
				." SET \"Zaitaku_conf\" = :zaitaku_conf, \"Conf_1_datetime\" = :conf_1_datetime, \"Conf_1_status\" = :conf_1_status, \"Conf_2_datetime\" = :conf_2_datetime, \"Conf_2_status\" = :conf_2_status WHERE id = :id";
		$parameters = array( ':id' => $detailID,
							 ':zaitaku_conf' => null,
							 ':conf_1_datetime' => null,
							 ':conf_1_status' => null,
							 ':conf_2_status'=> null,
							 ':conf_2_datetime' => null,
							 );
		return Yii::app()->db->createCommand($sql)->execute($parameters);
	}
	public function sql_tickets_export_csv(){

		$sql = "FROM contract WHERE start_date IS NOT NULL ";
        
			if ($this->telephone){
				$sql.=" AND (tel1 LIKE '%".$this->telephone."%' OR tel2 LIKE '%".$this->telephone."%' 
							OR mobile1 LIKE '%".$this->telephone."%' OR mobile2 LIKE '%".$this->telephone."%' )";
			}
			if ($this->ticket_id){
				$sql.=" AND (ticket_id LIKE '%" . $this->ticket_id ."%') ";
				
			}
			
		return $sql;
    }
}
