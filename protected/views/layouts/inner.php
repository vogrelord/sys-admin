<?php $this->beginContent('//layouts/base'); ?>


       <div class='top row'>
       <div class='top-logo'><?php print CHtml::link('ООО &laquo;Системный Администратор&raquo;',array('/'));?></div>
       		<?php
       			$this->widget('zii.widgets.CMenu', array(
       				'activateItems'=>true,
       				'htmlOptions'=>array('class'=>'top_menu'),
				    'items'=>array(
				        // Important: you need to specify url as 'controller/action',
				        // not just as 'controller' even if default acion is used.
				        array('label'=>'О нас', 'url'=>array('/')),
				        array('label'=>'Обращение в техподдержку', 'url'=>array('/site/contact')),
				        array('label'=>'Юридические документы', 'url'=>array('/document')),
				        // 'Products' menu item will be selected no matter which tag parameter value is since it's not specified.
				        //array('label'=>'Формы оплаты', 'url'=>array('support')),
				    ),
				)); 
       		?>

       </div>

       <h1 class='page-title'><?php echo $this->pageTitle; ?></h1>



       <div id = 'crumbs'>
	       <?php
	       		if($this->breadcrumbs){
	           		$this->widget('zii.widgets.CBreadcrumbs', array(
	           			'links'=>$this->breadcrumbs,
	           			'homeLink'=>CHtml::link('Главная', array('/site/index')),
					));
	           	}
	       ?>
       </div>
      

      <div class='twelve columns'>

      <?php print $content; ?>
      </div>
      

<?php $this->endContent();?>