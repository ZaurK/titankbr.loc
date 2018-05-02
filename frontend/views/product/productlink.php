<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;	
use common\helpers\getTranslit;
?>
		
<div class="col-md-4 col-sm-6 margin26">
				<div class="single-product">
                                <div class="product-f-image">
								
								
                                <?php echo Html::a(Html::img("@frontendWebroot/uploads/images/".$pimg));
								?> 
                                    <div class="product-hover">                                      
										<?php
										echo '<a href="';			
			                            echo Url::toRoute(['product/view', 'id' => $id, 'slug'=>getTranslit::translit($ptitle)]);                      			
			                            echo '" , class="view-details-link"><i class="fa fa-link"></i>Подробнее</a>';
										?>
                                    </div>
                                </div>
                                
                                
								<?php
										echo '<h2><a href="';			
			                            echo Url::toRoute(['product/view', 'id' => $id]);                      			
			                            echo '">'.$ptitle.'</a></h2>';
										?>
								
                                
                                <div class="product-carousel-price">
                                    <ins><?=$price?></ins>
                                </div> 
                </div>
</div>
