<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property integer $organisation_id
 * @property string $profile
 * @property integer $admin
 *
 * The followings are the available model relations:
 * @property Chat[] $chats
 * @property Records[] $records
 * @property Organisation[] $organisation
 */
class User extends CActiveRecord
{
    
    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email, first_name, last_name, profile', 'required'),
			array('admin', 'numerical', 'integerOnly'=>true),
            array('id, username, email, first_name, last_name, profile, admin', 'safe'),
            array('admin', 'in', 'range'=>array(0,1)),
			array('username, email, first_name, last_name', 'length', 'max'=>128),
			array('password', 'length', 'max'=>64),
            array('username, email', 'unique'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, email, first_name, last_name, profile, admin', 'safe', 'on'=>'search'),
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
			'chats' => array(self::HAS_MANY, 'Chat', 'user_id'),
			'records' => array(self::HAS_MANY, 'Records', 'user_id'),
            'organisation' => array(self::BELONGS_TO, 'Organisation', 'organisation_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'organisation_id' => 'Organisation',
			'profile' => 'Profile',
			'admin' => 'Admin',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('organisation_id',$this->organisation_id);
		$criteria->compare('profile',$this->profile,true);
		$criteria->compare('admin',$this->admin);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public function validatePassword($password)
    {
        return CPasswordHelper::verifyPassword($password,$this->password);
    }
 
    public function beforeSave(){
        parent::beforeSave();
        if ($this->isNewRecord){
            $this->password = $this->hashPassword($this->password);
        } 
        return true;
    }
    
    public function hashPassword($password)
    {
        return CPasswordHelper::hashPassword($password);
    }
    
}
