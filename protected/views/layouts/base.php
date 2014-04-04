

<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>ООО «Системный администратор» <?php print $this->pageTitle ? '- '.$this->pageTitle : ''?></title>
  
  <!-- Included CSS Files (Uncompressed) -->
  <!--
  <link rel="stylesheet" href="stylesheets/foundation.css">
  -->
  
  <!-- Included CSS Files (Compressed) -->
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation.min.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/app.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.min.css">

  <script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/modernizr.foundation.js"></script>
  
  <!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Playfair+Display:400italic&subset=cyrillic,latin' rel='stylesheet' type='text/css' />
  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>
<body>

  <div class="row page_wrap">
    <!-- page wrap -->
    <div class="twelve columns">
      <!-- page wrap -->

      <!--div class="row">
        <div class="nine columns header_nav">
            <ul id="menu-header" class="nav-bar horizontal">
              <li><a href="index.html">Главная</a></li>

              <li class="has-flyout">
                <a href="#">Услуги</a><a href="#" class="flyout-toggle"></a>

                <ul class="flyout">
                
                  <li class="has-flyout"><a href="blog.html">Blog</a></li>
                  
                  <li class="has-flyout"><a href="blog_single.html">Blog Single Page</a></li>
                  
                  <li class="has-flyout"><a href="products-page.html">Products Page</a></li>

                  <li class="has-flyout"><a href="product-single.html">Product Single</a></li>
                  
                  <li class="has-flyout"><a href="pricing-table.html">Pricing Table</a></li>

                  <li class="has-flyout"><a href="contact.html">Contact Page</a></li>

                </ul>
              </li>

              <li class=""><a href="galleries.html">Клиенты</a></li>
              
              <li class=""><a href="portfolio.html">Контакты</a></li>

            </ul><script type="text/javascript">
           //<![CDATA[
           $('ul#menu-header').nav-bar();
            //]]>
            </script>
          </div>
          
          <div class="three columns header_logo">
            
          </div>
          
        </div--><!-- END Header -->


      

      <?php print $content; ?>
        
      </div><!-- end row -->
      

      <div class="row">
        <div class="twelve columns">
          <ul id="menu3" class="footer_menu horizontal">
          </ul>
      </div>
      </div>
		  
		
      </div>

    </div><!-- end page wrap) -->
    <!-- Included JS Files (Compressed) -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/foundation.js" type="text/javascript">
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/jquery.placeholder.js" type="text/javascript">
</script> <!-- Initialize JS Plugins -->
     
  
</body>
</html>

<?php

    Yii::app()->clientScript->registerCoreScript('bbq');

?>