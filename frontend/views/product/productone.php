<?php
/* @var $this yii\web\View */
use yii\helpers\Url;	
use yii\helpers\Html;
?>
		
<div class="col-md-6 col-sm-6 margin26">
				<div class="single-product">
                          <div class="product-f-image">
								
								<?php echo Html::a(Html::img("@frontendWebroot/uploads/images/".$pimg), 
			 "@frontendWebroot/uploads/images/".$pimg, 
			 ['rel' => 'fancybox',  'style'=>'max-width:100%', 'title'=>$ptitle]);
								?>
                       
                                    
                                </div>
                                
                                
                </div>
</div>
<div class="col-md-6 col-sm-6 margin26">
    <h2><?= $ptitle?></h2>                                
        <div class="product-carousel-price">
            <ins><?=$price?></ins>
        </div>
        <p><?=$pdescription?></p>		
</div>
