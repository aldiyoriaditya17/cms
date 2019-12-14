<?php 
use yii\helpers\Html; 
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
?>

			<div class="content">
			        <div class="content">
			          <div class="container-fluid">				
					<?= $content ?>
				</div>
			</div>
			</div>
			 <footer class="footer">
			                   <div class="container-fluid">
					<div class="copyright ml-auto" title="Arif Nur Rahman">
						Copyright &copy; 
						<?php
							date_default_timezone_set('Asia/Jakarta');
							$date = date("Y");
							echo $date . ".";
						?> <a class="font-weight-bold ml-1" title="Arif Nur Rahman" style="color: #002d7f;">Human Capital Management - Telkomsel. All rights reserved.</a>
					</div>				
				</div>
			                  </footer>