<?php
/* @var $this DocumentCategoryController */
/* @var $model DocumentCategory */

$this->breadcrumbs=array(
	'Document Categories'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DocumentCategory', 'url'=>array('index')),
	array('label'=>'Create DocumentCategory', 'url'=>array('create')),
	array('label'=>'View DocumentCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DocumentCategory', 'url'=>array('admin')),
);
?>

<h1>Update DocumentCategory <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>