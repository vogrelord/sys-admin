<?php $this->beginContent('//layouts/base'); ?>


       <div class='top row'>
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
      
      

      

      <?php print $content; ?>
      

<?php $this->endContent();?>