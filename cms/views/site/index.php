 <?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\bootstrap\ActiveForm;
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
$asset = cms\assets\DashboardAsset::register($this);
$baseUrl = $asset->baseUrl;


?>




  <div class="row">
              <div class="col-md-12">
                <div class="card ">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons"></i>
                    </div>
                    <h4 class="card-title">Trending Topic</h4>
                  </div>
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-md-6">
                      <div class="material-datatables">
                          <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                      <thead>
                         <tr>
                <th>Nama Hashtag</th>
                <th>Jumlah</th>
              
              
                        </tr>
                      </thead>
        <tbody>
            <?php
           foreach ($coba as $row => $value) : ?>
            <tr>
                <td><?php echo $row; ?></td>
                <td><?php echo $value; ?></td>
                
               
              
            </tr>
             <?php endforeach; ?>
                      </tbody>
                    </table>
                          </div>
                          </div>
                          
                         
                          </div>
                          </div>
                         </div>
                  
     <div class="col-md-12">
                     <h3>Most Comment</h3>
                        <br>
                        <div class="row">
                          <?php

                     foreach($by_comments as $row){

                     ?>
                          <div class="col-md-4">
                            <div class="card card-product">
                              <div class="card-header card-header-image" data-header-animation="true">
                                <a href="">
                          <?php
                          echo '<img src="data:'.$row['file_type'].';base64,'.base64_encode( $row['file_content'] ).'" width=300 height=250/>';?>
                                </a>
                              </div>
                              <div class="card-body">
                                <div class="card-actions text-center">
                                  <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                    <i class="material-icons">build</i> Fix Header!
                                  </button>
                                  
                                </div>
                            
                                <h4 class="card-title">
                                  <a href="#pablo">   <?php echo $row['owner_name'];?></a>
                                </h4>
                                <div class="card-description">
                                 <?php echo $row['caption'];?>
                                </div>
                              </div>
                              <div class="card-footer">
                                 <div class="stats">
                                  
                                  <p class="card-category"><i class="material-icons">
                                   <?= Html::a('favorite', ['posting/listlike', 'id' => $row['id_posting']]) ?></i> <?php echo $row['like_count'];?></p>
                                </div>
                                <div class="stats">
                                  <p class="card-category"><i class="material-icons"><?= Html::a('comment', ['posting/listcomment', 'id' => $row['id_posting']]) ?></i> <?php echo $row['comment_count'];?></p>
                                </div>
                              </div>
                            </div>
                          </div>

                           <?php
                         }
                          ?>
                           </div>
                    </div>
                      <div class="col-md-12">
                     <h3>Most Likes</h3>
                        <br>
                        <div class="row">
                          <?php
                
                     foreach($by_likes as $row){

                     ?>
                          <div class="col-md-4">
                            <div class="card card-product">
                              <div class="card-header card-header-image" data-header-animation="true">
                                <a href="#pablo">
                             
<?php
                          echo '<img src="data:'.$row['file_type'].';base64,'.base64_encode( $row['file_content'] ).'" width=300 height=250/>';?>
                                </a>
                              </div>
                              <div class="card-body">
                                <div class="card-actions text-center">
                                  <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                    <i class="material-icons">build</i> Fix Header!
                                  </button>
                                  
                                </div>
                            
                                <h4 class="card-title">
                                  <a href="#pablo">   <?php echo $row['owner_name'];?></a>
                                </h4>
                                <div class="card-description">
                                 <?php echo $row['caption'];?>
                                </div>
                              </div>
                              <div class="card-footer">
                                 <div class="stats">
                                  
                                  <p class="card-category"><i class="material-icons">
                                   <?= Html::a('favorite', ['posting/listlike', 'id' => $row['id_posting']]) ?></i> <?php echo $row['like_count'];?></p>
                                </div>
                                <div class="stats">
                                  <p class="card-category"><i class="material-icons"><?= Html::a('comment', ['posting/listcomment', 'id' => $row['id_posting']]) ?></i> <?php echo $row['comment_count'];?></p>
                                </div>
                              </div>
                            </div>
                          </div>

                           <?php } ?>

 <div class="col-md-12">
                     <h3>Most Viewers</h3>
                        <br>
                        <div class="row">
                          <?php
                     //$db= yii::$app->db;
                    // $row= $db->createCommand('SELECT * from posting_detail left join posting on posting.id_posting=posting_detail.id_posting where posting.type_posting=1 order by posting.views_count desc limit 3')->queryAll();
                     foreach($by_views as $row){

                     ?>
                          <div class="col-md-4">
                            <div class="card card-product">
                              <div class="card-header card-header-image" data-header-animation="true">
                                <a href="#pablo">
                             
<?php
                          echo '<img src="data:'.$row['file_type'].';base64,'.base64_encode( $row['file_content'] ).'" width=300 height=250/>';?>
                                </a>
                              </div>
                              <div class="card-body">
                                <div class="card-actions text-center">
                                  <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                    <i class="material-icons">build</i> Fix Header!
                                  </button>
                                  
                                </div>
                            
                                <h4 class="card-title">
                                  <a href="#pablo">   <?php echo $row['owner_name'];?></a>
                                </h4>
                                <div class="card-description">
                                 <?php echo $row['caption'];?>
                                </div>
                              </div>
                              <div class="card-footer">
                                 <div class="stats">
                                  
                                  <p class="card-category"><i class="material-icons">
                                   <?= Html::a('favorite', ['posting/listlike', 'id' => $row['id_posting']]) ?></i> <?php echo $row['like_count'];?></p>
                                </div>
                                <div class="stats">
                                  <p class="card-category"><i class="material-icons"><?= Html::a('comment', ['posting/listcomment', 'id' => $row['id_posting']]) ?></i> <?php echo $row['comment_count'];?></p>
                                </div>
                              </div>
                            </div>
                          </div>

                           <?php } ?>

                    </div>

