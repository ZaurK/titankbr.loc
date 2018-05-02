<?php
/* @var $this yii\web\View */
use yii\helpers\Html;	
use yii\helpers\Url;	
?>
                    <li>						
						<?=Html::img('@frontendWebroot/uploads/slides/' . $img, ['class'=>''])?>
						<div class="caption-group">
							<h2 class="caption title">
								<?=$stext[0] ?><br>
								<span class="primary"><?=$stext[1] ?><span>				
							</h2>
							<h4 class="caption title"><?=$stext[2] ?></h4>
							<?= Html::a('<span class="icon"></span>Перейти', $slink, ['class' => 'caption button-radius']) ?>
						</div>
					</li>