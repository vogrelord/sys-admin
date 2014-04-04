<?php
/* @var $this DocumentController */
/* @var $model Document */

$this->breadcrumbs=array(
		'Юридические документы'=>array('/document'),
		$model->title
);

/*$this->menu=array(
	array('label'=>'List Document', 'url'=>array('index')),
	array('label'=>'Create Document', 'url'=>array('create')),
	array('label'=>'Update Document', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Document', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Document', 'url'=>array('admin')),
);*/

$this->pageTitle = $model->title;
?>

<div class="row">
	<div class='content ten columns'>
	   <?php print $model->text ?>
	</div>

	<div class='files two columns'>
		<?php if($model->doc_file) print CHtml::link('Скачать .doc', $model->getFilePath($model->doc_file),array('class'=>'dl-link icon-doc')) ?>
		<?php if($model->pdf_file) print CHtml::link('Скачать .pdf', $model->getFilePath($model->pdf_file),array('class'=>'dl-link icon-pdf')) ?>
	</div>
</div>
