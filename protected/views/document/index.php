<?php
/* @var $this DocumentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Документы',
);

$this->pageTitle = 'Юридические документы';

?>

<div class='content'>
	<?php foreach ($categories as $key => $category):?>
		<h3><?php echo $category->title?></h3>
		<ol>
			<?php foreach ($category->documents as $key => $doc): ?>
				<li>
					 <?php echo CHtml::link($doc->title, array('document/view', 'id'=>$doc->id)) ?>
					 <?php echo $doc->doc_links()?>
				</li>
			<?php endforeach; ?>
		</ol>
	<?php endforeach; ?>


	<h3>Прочие документы</h3>

	<ol>
		<?php foreach ($freeDocuments as $key => $doc):?>
				<li>
					 <?php echo CHtml::link($doc->title, array('document/view', 'id'=>$doc->id)) ?>
					 <?php echo $doc->doc_links()?>
				</li>		
		<?php endforeach; ?>
	</ol>

</div>