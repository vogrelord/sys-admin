<?php
/* @var $this DocumentController */
/* @var $model Document */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'document-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>1024)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->dropDownList($model, 'category_id', CHtml::listData(DocumentCategory::model()->findAll(), 'id', 'title')); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php $this->widget( 'application.extensions.eckeditor.ECKEditor', array(
		  'model' => $model, // Your model
		  'attribute' => 'text', // Attribute for textarea
		)); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'doc_file'); ?>
		<?php echo $form->fileField($model,'doc_file'); ?>
		<?php 
			if($model->doc_file){
				echo CHtml::link($model->doc_file, $model->doc_url());
			}
		?>
		<?php echo $form->error($model,'doc_file'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pdf_file'); ?>
		<?php echo $form->fileField($model,'pdf_file'); ?>
		<?php 
			if($model->pdf_file){
				echo CHtml::link($model->pdf_file, $model->pdf_url());
			}
		?>
		<?php echo $form->error($model,'pdf_file'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'wymupdate')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->