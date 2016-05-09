<?php

/**
 * This is the model class for table "contract".
 *
 * The followings are the available columns in table 'contract':
 * @property integer $id
 * @property string $licence_key
 * @property string $first_name1
 * @property string $last_name1
 * @property string $first_kana1
 * @property string $last_kana1
 * @property string $tel1
 * @property string $mobile1
 * @property string $email1
 * @property string $zip_code1
 * @property string $pref1
 * @property string $address1_1
 * @property string $address1_2
 * @property string $address1_3
 * @property string $address1_4
 * @property string $remark1
 * @property string $first_name2
 * @property string $last_name2
 * @property string $first_kana2
 * @property string $last_kana2
 * @property string $tel2
 * @property string $mobile2
 * @property string $email2
 * @property string $zip_code2
 * @property string $pref2
 * @property string $address2_1
 * @property string $address2_2
 * @property string $address2_3
 * @property string $address2_4
 * @property string $remark2
 * @property integer $user_type
 * @property string $openid
 * @property string $record_type
 * @property string $start_date
 * @property string $end_date
 * @property string $create_date
 * @property string $remark3
 * @property string $Conf_3_datetime
 * @property string $Conf_3_status
 */
class BaseContract extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contract';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('licence_key', 'required'),
			array('user_type', 'numerical', 'integerOnly'=>true),
			array('licence_key, first_name1, last_name1, first_kana1, last_kana1, tel1, mobile1, zip_code1, first_name2, last_name2, first_kana2, last_kana2, tel2, mobile2, zip_code2', 'length', 'max'=>20),
			array('email1, email2', 'length', 'max'=>50),
			array('record_type', 'length', 'max'=>2),
			array('pref1, address1_1, address1_2, address1_3, address1_4, remark1, pref2, address2_1, address2_2, address2_3, address2_4, remark2, openid, start_date, end_date, create_date,first_name3, last_name3, first_kana3, last_kana3, tel3, mobile3, zip_code3, pref3, address3_1, address3_2, address3_3, address3_4, relationship3, remark3, Conf_3_datetime, Conf_3_status, age_group, age_group2', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, licence_key, first_name1, last_name1, first_kana1, last_kana1, tel1, mobile1, email1, zip_code1, pref1, address1_1, address1_2, address1_3, address1_4, remark1, first_name2, last_name2, first_kana2, last_kana2, tel2, mobile2, email2, zip_code2, pref2, address2_1, address2_2, address2_3, address2_4, remark2, user_type, openid, record_type, start_date, end_date, create_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
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
			'first_name1' => 'First Name1',
			'last_name1' => 'Last Name1',
			'first_kana1' => 'First Kana1',
			'last_kana1' => 'Last Kana1',
			'tel1' => 'Tel1',
			'mobile1' => 'Mobile1',
			'email1' => 'Email1',
			'zip_code1' => 'Zip Code1',
			'pref1' => 'Pref1',
			'address1_1' => 'Address1 1',
			'address1_2' => 'Address1 2',
			'address1_3' => 'Address1 3',
			'address1_4' => 'Address1 4',
			'remark1' => 'Remark1',
			'first_name2' => 'First Name2',
			'last_name2' => 'Last Name2',
			'first_kana2' => 'First Kana2',
			'last_kana2' => 'Last Kana2',
			'tel2' => 'Tel2',
			'mobile2' => 'Mobile2',
			'email2' => 'Email2',
			'zip_code2' => 'Zip Code2',
			'pref2' => 'Pref2',
			'address2_1' => 'Address2 1',
			'address2_2' => 'Address2 2',
			'address2_3' => 'Address2 3',
			'address2_4' => 'Address2 4',
			'remark2' => 'Remark2',
			'user_type' => 'User Type',
			'openid' => 'Openid',
			'record_type' => 'Record Type',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'create_date' => 'Create Date',
			'first_name3' => 'first_name3',
			 'last_name3' => 'last_name3',
			 'first_kana3' => 'first_kana3',
			 'last_kana3' => 'last_kana3',
			 'tel3' => 'tel3',
			 'mobile3' => 'mobile3',
			 'zip_code3' => 'zip_code3',
			 'pref3' => 'pref3',
			 'address3_1' => 'address3_1',
			 'address3_2' => 'address3_2',
			 'address3_3' => 'address3_3',
			 'address3_4' => 'address3_4',
			 'relationship3' => 'relationship3',
			 'remark3' => 'remark3',
			 'Conf_3_datetime' => 'Conf_3_datetime', 
			 'Conf_3_status' => 'Conf_3_status',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('licence_key',$this->licence_key,true);
		$criteria->compare('first_name1',$this->first_name1,true);
		$criteria->compare('last_name1',$this->last_name1,true);
		$criteria->compare('first_kana1',$this->first_kana1,true);
		$criteria->compare('last_kana1',$this->last_kana1,true);
		$criteria->compare('tel1',$this->tel1,true);
		$criteria->compare('mobile1',$this->mobile1,true);
		$criteria->compare('email1',$this->email1,true);
		$criteria->compare('zip_code1',$this->zip_code1,true);
		$criteria->compare('pref1',$this->pref1,true);
		$criteria->compare('address1_1',$this->address1_1,true);
		$criteria->compare('address1_2',$this->address1_2,true);
		$criteria->compare('address1_3',$this->address1_3,true);
		$criteria->compare('address1_4',$this->address1_4,true);
		$criteria->compare('remark1',$this->remark1,true);
		$criteria->compare('first_name2',$this->first_name2,true);
		$criteria->compare('last_name2',$this->last_name2,true);
		$criteria->compare('first_kana2',$this->first_kana2,true);
		$criteria->compare('last_kana2',$this->last_kana2,true);
		$criteria->compare('tel2',$this->tel2,true);
		$criteria->compare('mobile2',$this->mobile2,true);
		$criteria->compare('email2',$this->email2,true);
		$criteria->compare('zip_code2',$this->zip_code2,true);
		$criteria->compare('pref2',$this->pref2,true);
		$criteria->compare('address2_1',$this->address2_1,true);
		$criteria->compare('address2_2',$this->address2_2,true);
		$criteria->compare('address2_3',$this->address2_3,true);
		$criteria->compare('address2_4',$this->address2_4,true);
		$criteria->compare('remark2',$this->remark2,true);
		$criteria->compare('user_type',$this->user_type);
		$criteria->compare('openid',$this->openid,true);
		$criteria->compare('record_type',$this->record_type,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('create_date',$this->create_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BaseContract the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
