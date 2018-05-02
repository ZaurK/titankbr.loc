<?php
/* @var $this yii\web\View */

use common\helpers\getCategoriesLinksSidebar;
use common\helpers\getProductItem;	
?>
<?php
        $this->title = $model->ctitle;
        $this->registerMetaTag(['name'=>'keywords', 'content'=>$model->ctitle]);
        $this->registerMetaTag(['name'=>'description', 'content'=>$model->cdescription]);
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
				    
				        <?=getProductItem::getLinks()?>

					
                    <p style="text-align:justify"><?=nl2br($model->cdescription)?></p><br>				
				</div>           
            </div>
        </div>
    </div>


