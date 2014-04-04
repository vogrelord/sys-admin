<?php

/**
 * This is the model class for table "tbl_document".
 *
 * The followings are the available columns in table 'tbl_document':
 * @property string $id
 * @property string $title
 * @property string $text
 * @property string $doc_file
 * @property string $pdf_file
 */
class Document extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_document';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, text', 'required'),
			array('title', 'length', 'max'=>1024),
			//array('doc_file', 'file',  'types'=>'doc, docx, rtf'),
			//array('pdf_file', 'file',  'types'=>'pdf'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, text', 'safe', 'on'=>'search'),
			array('category, category_id', 'safe'),
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
			'category'=>array(self::BELONGS_TO, 'DocumentCategory','category_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Заголовок',
			'text' => 'Текст',
			'doc_file' => 'Файл Doc',
			'category_id' => 'Категория',
			'pdf_file' => 'Файл Pdf',
		);
	}

	public function doc_links(){
		$links = array();
		
		if($this->doc_file) 
			array_push($links, CHtml::link('doc', $this->doc_url()));
		if($this->pdf_file) 
			array_push($links, CHtml::link('pdf', $this->pdf_url()));

		if(!count($links)){
			return '';
		} else {
			return "(".implode(', ', $links).")"; 
		}

	}

	public function getTruncatedText(){
		return substr($this->text, 0, 200);
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('text',$this->text,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public function doc_url(){
		return $this->getFileUrl($this->doc_file);
	}

	public function pdf_url(){
		return $this->getFileUrl($this->pdf_file);
	}



	public function getFilePath($file_name){
			return Yii::app()->request->baseUrl.'/upload/documents/'.$this->id.'/'.$file_name;
	}

	public function getFileUrl($file_name){
			return Yii::app()->request->baseUrl.'/upload/documents/'.$this->id.'/'.$file_name;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Document the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
