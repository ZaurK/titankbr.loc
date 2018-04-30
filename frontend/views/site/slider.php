<?php
/* @var $this yii\web\View */
use yii\helpers\Html;		
?>
 <li>
						
						<?=Html::img('@frontendWebroot/uploads/slides/' . $img, ['class'=>''])?>
						<div class="caption-group">
							<h2 class="caption title">
								<?=$stext[0] ?><br>
								<span class="primary"><?=$stext[1] ?><strong>				
							</h2>
							<h4 class="caption title"><?=$stext[2] ?></h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Перейти</a>
						</div>
					</li>