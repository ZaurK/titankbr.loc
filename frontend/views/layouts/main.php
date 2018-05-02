<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\AppAsset;
use common\helpers\getFilelink;
use common\helpers\getCategories;
use common\helpers\getCustomers;
use common\helpers\getSlider;
use backend\models\Slider;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
  <head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
	 <?php $this->head() ?>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <?php $this->beginBody() ?>
   
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="titan-top">
                        Общество с ограниченной ответственностью "Титан"
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                       
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                  <div class="col-sm-3 col-xs-12">
                    <div class="logo">
                        <h1><a href="<?= Url::toRoute(['site/index']); ?>"><img src="/img/logo.png"></a></h1>
                    </div>
                  </div>
                  <div class="col-sm-4 col-xs-12">
				    <div class="adress">
				    г. Нальчик, ул.Циолковского, 7<br>
                    email: titan_kbr@mail.ru
					</div>
				  </div>
                  <div class="col-sm-3 col-xs-12">				 
                    <div class="realize">
					      Реализация<br>
                          <span class="green">экологически чистой</span><br>
                          бумажной продукции
                    </div>
                  </div>
				  <div class="col-sm-2 col-xs-12">
				    <div class="phones">
					      +7(8662)44-55-17<br>
                          +7(909)487-73-51<br>
                          +7(928)915-21-68
                    </div>
				  </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
					    <?php $flink = getFilelink::getLink(); ?>
                        <li class="active"><a href="<?= Url::toRoute(['site/index']); ?>"><i class="fa fa-home fa-lg" aria-hidden="true"></i></a></li>
                        <li><a href="<?= Url::toRoute(['category/view', 'id' => 1]); ?>">Продукция</a></li>
                        <li><a href="<?= Url::toRoute(['site/delivery']); ?>">Доставка</a></li>
                        <li><?= Html::a('Прайс-лист', ['uploads/files/' .$flink], ['title' => 'Скачать прайс-лист', 'id'=>'fileload']) ?></li>
                        <li><a href="<?= Url::toRoute(['site/about']); ?>">О нас</a></li>
                        <li><a href="<?= Url::toRoute(['site/contacts']); ?>">Контакты</a></li>
                    </ul>
                </div>			
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    
    <div class="slider-area">
        	<!-- Slider -->
			<div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">
					<?= getSlider::getSlides() ?>
				</ul>
			</div>
			<!-- ./Slider -->
    </div> <!-- End slider area -->
    
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-thumbs-o-up"></i>
                        <p>Свое производство</p>
                    </div>
                </div>
				  <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                        <p>Прайс-лист</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                        <p>Доставка</p>
                    </div>
                </div>              
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-smile-o" aria-hidden="true"></i>
                        <p>Довольные клиенты</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->
    
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Продукция</h2>
                        <div class="product-carousel">
                             <?= getCategories::getLinks() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->
    
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
					 <h2 class="section-title">Нам доверяют</h2>
                        <div class="brand-list">
                            <?= getCustomers::getLinks() ?>                         
                        </div><br>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->
    
  
    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="footer-about-us">
                        <h3><span>"Титан"</span></h3>
                        <p>Чтобы быть в курсе последних новостей, подписывайтесь на наш инстаграм titan_kbr07</p>
                        <div class="footer-social">
                            <a href="https://www.instagram.com/titan_kbr07" target="_blank" title="Мы в Instagram, присоединяйтесь!"><i class="fa fa-instagram"></i></a>
                           
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-4">
                        <div class="footer-about-us">
						<h3><span>Контакты:</span></h3>
                            <p>г. НАЛЬЧИК, ул.ЦИОЛКОВСКОГО, 7<br>
                            <p>EMAIL: TITAN_KBR@MAIL.RU</p>                  
                </div>
                </div>
                
               
                
                <div class="col-sm-4">
                     <div class="footer-about-us">
                       <h3><span>Телефоны:</span></h3>
                            <p>+7(8662)44-55-17<br>
                            <p>+7(909)487-73-51</p>                       
                            <p>+7(928)915-21-68</p>                       
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->
    
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2012-<?=date(Y)?> ООО "Титан". </p>
                    </div>
                </div>
                
                <div class="col-md-4">
                   
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
	<?php $this->endBody() ?>
  </body>
</html>
<?php $this->endPage() ?>