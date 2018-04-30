<?php
/* @var $this yii\web\View */

use common\helpers\getCategoriesLinksSidebar;
use common\helpers\getProductOne;	
?>
<?php
echo newerton\fancybox\FancyBox::widget([
    'target' => 'a[rel=fancybox]',
    'helpers' => true,
    'mouse' => true,
    'config' => [
        'maxWidth' => '90%',
        'maxHeight' => '90%',
        'playSpeed' => 7000,
        'padding' => 10,
        'fitToView' => false,
        'width' => '70%',
        'height' => '70%',
        'autoSize' => false,
        'closeClick' => false,
        'openEffect' => 'elastic',
        'closeEffect' => 'elastic',
        'prevEffect' => 'elastic',
        'nextEffect' => 'elastic',
        'closeBtn' => false,
        'openOpacity' => true,
        'helpers' => [
            'title' => ['type' => 'inner'],
            'buttons' => false,
            'thumbs' => false,
            'overlay' => [
                'css' => [
                    'background' => 'rgba(0, 0, 0, 0.8)',
                ]
            ]
        ],
    ]
]);
?>	    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">                 
						<h2><?=$model->ctitle?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
		    <div class="row">
                <div class="col-md-3 col-sm-12">
				<?=getCategoriesLinksSidebar::getLinks()?>
				</div>
				<div class="col-md-9 col-sm-12">
				    <ul class='category_list'>
				        <?=getProductOne::getProduct()?>
					</ul>				
				</div>           
            </div>
        </div>
    </div>
