<?php
/* @var $this ContactController */
/* @var $model Contact */

$this->pageTitle = 'Редактировать '.$model->title;

$this->breadcrumbs=array(
	'Contacts'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Создать заявку', 'url'=>array('create')),
	array('label'=>'Просмотреть заявку', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Удалить заявку', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'К списку', 'url'=>array('admin')),
);
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>