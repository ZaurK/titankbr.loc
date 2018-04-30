<?php
/* @var $this yii\web\View */

use yii\helpers\Url;		
?>
<div class="single-product">
                                <div class="product-f-image">
								
								<?= $img?>
                                
                                    <div class="product-hover">
                                        
                                        
										<?php
										echo '<a href="';			
			                            echo Url::toRoute(['category/view', 'id' => $id]);                      			
			                            echo '" , class="view-details-link"><i class="fa fa-link"></i>Перейти</a>';
										?>
                                    </div>
                                </div>
                                
                               
                                <?php
										echo '<h2><a href="';			
			                            echo Url::toRoute(['category/view', 'id' => $id]);                      			
			                            echo '">'.$ctitle.'</a></h2>';
										?>
                                
</div>