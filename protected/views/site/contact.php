<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle='Оставить заявку на техподдержку';
$this->breadcrumbs=array(
	'Контакты',
);
?>

<div class='row'>

		<?php if(Yii::app()->user->hasFlash('contact')): ?>

		<div class="flash-success">
			<?php echo Yii::app()->user->getFlash('contact'); ?>
		</div>

		<?php else: ?>

	
		<div class="form eight columns" >

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'contact-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
			'htmlOptions'=> array(
				'enctype'=>'multipart/form-data'
			)
		)); ?>

			<p class="note">Поля, отмеченные <span class="required">*</span> - обязательны.</p>

			<?php echo $form->errorSummary($model); ?>

			<div class="row">
				<?php echo $form->labelEx($model,'name'); ?>
				<?php echo $form->textField($model,'name'); ?>
				<?php echo $form->error($model,'name'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'email'); ?>
				<?php echo $form->textField($model,'email'); ?>
				<?php echo $form->error($model,'email'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'phone'); ?>
				<?php echo $form->textField($model,'phone'); ?>
				<?php echo $form->error($model,'phone'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'comment'); ?>
				<?php echo $form->textArea($model,'comment',array('rows'=>6, 'cols'=>50)); ?>
				<?php echo $form->error($model,'comment'); ?>
			</div>

			<div class="row attached-file">
				<label>Прикрепить файл</label>
				<?php
				  $this->widget('CMultiFileUpload', array(
				     'name'=>'files',
				     //'accept'=>'jpg|gif|png',
				     'options'=>array(
				        // 'onFileSelect'=>'function(e, v, m){ alert("onFileSelect - "+v) }',
				        // 'afterFileSelect'=>'function(e, v, m){ alert("afterFileSelect - "+v) }',
				        // 'onFileAppend'=>'function(e, v, m){ alert("onFileAppend - "+v) }',
				        // 'afterFileAppend'=>'function(e, v, m){ alert("afterFileAppend - "+v) }',
				        // 'onFileRemove'=>'function(e, v, m){ alert("onFileRemove - "+v) }',
				        // 'afterFileRemove'=>'function(e, v, m){ alert("afterFileRemove - "+v) }',
				     ),
				     'denied'=>'File is not allowed',
				     'max'=>10, // max 10 files
				  ));
				?>
			</div>
			

			<div class="row buttons">
				<?php echo CHtml::submitButton('Отправить',array('class'=>'button')); ?>
			</div>

		<?php $this->endWidget(); ?>

		</div><!-- form -->

		<?php endif; ?>

</div>