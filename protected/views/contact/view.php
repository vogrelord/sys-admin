<?php
/* @var $this ContactController */
/* @var $model Contact */

$this->breadcrumbs=array(
	'Contacts'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Создать заявку', 'url'=>array('create')),
	array('label'=>'Редактировать заявку', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить заявку', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'К списку', 'url'=>array('admin')),
);
?>

<h1>Заявка на техобслуживание №<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'email',
		'phone',
		'create_time',
		'comment',
	),
)); ?>

<h3> Прикрепленные файлы: </h3>

<ul>
<?php 
	foreach ($model->files as $i => $file):
		echo '<li>';
		echo CHtml::link(
							$file->path, 
							Yii::app()->request->baseUrl.'/upload/contacts/'.$file->contact_id.'/'.$file->path,
							array('download'=>true)
						); 
		echo '</li>';
	endforeach;
?>
</ul>
