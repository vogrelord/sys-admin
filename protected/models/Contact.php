<?php

class Contact extends CActiveRecord
{

    public $name;
	public $email;
	public $phone;
	public $comment;
	public $create_time;


    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
 
    public function tableName()
    {
        return 'tbl_contact';
    }


    public function relations()
    {
        return array(
            'files' => array(self::HAS_MANY, 'ContactFile', 'contact_id'),
        );
    }


    public function search() {
            $criteria=new CDbCriteria;

            
            $criteria->compare('create_time',$this->create_time,true);
            $criteria->compare('name',$this->name,true);
            $criteria->compare('email',$this->email,true);
            $criteria->compare('phone',$this->phone,true);

            return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
            ));
    }
}