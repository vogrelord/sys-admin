<?php
/* @var $this DocumentCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Document Categories',
);

$this->menu=array(
	array('label'=>'Create DocumentCategory', 'url'=>array('create')),
	array('label'=>'Manage DocumentCategory', 'url'=>array('admin')),
);
?>

<h1>Document Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
