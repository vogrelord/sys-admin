<?php
/* @var $this DocumentCategoryController */
/* @var $model DocumentCategory */

$this->breadcrumbs=array(
	'Document Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DocumentCategory', 'url'=>array('index')),
	array('label'=>'Manage DocumentCategory', 'url'=>array('admin')),
);
?>

<h1>Create DocumentCategory</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>