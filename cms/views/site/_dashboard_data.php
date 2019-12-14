<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\components\Helpers;


?>
<br>
<!-- button in header start -->		
<div class="card container" style="margin-top:-20px;">
  <div class="card-header">
     <h4 class="card-title">Filter Dashboard</h4>
  </div>
  <div class="card-body">
    <div class="row" style="margin-top:-20px;"> 
<div class="col-lg-7">
<div class="form-inline">
  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
    </div>
    <input type="date" class="form-control" name="date_start" id="date_start">
  </div>
  <div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
    </div>
    <input type="date" class="form-control" name="date_end" id="date_end">
  </div>  
  <div class="input-group mb-3">
    <button class="btn btn-danger btn-border btn-round mr-2" id="btn-search" type="button"><i class="fa fa-search"></i></button>
  </div>  
</div>
       
</div>
<div class="col-lg-5 float-right">
        <!-- <a href="#" id="btnToday" class="<?php if($flag == "filter"){ echo "btn btn-round mr-2"; }else{ echo "btn btn-danger btn-border btn-round mr-2";} ?>">Filter</a> -->
        <a href="#" id="btnToday" class="<?php if($flag == "today"){ echo "btn btn-round mr-2"; }else{ echo "btn btn-danger btn-border btn-round mr-2";} ?>">Today</a>
        <a href="#" id="btnWeek" class="<?php if($flag == "week"){ echo "btn btn-round mr-2"; }else{ echo "btn btn-danger btn-border btn-round mr-2";} ?>">Week</a>
        <a href="#" id="btnMonth" class="<?php if($flag == "month"){ echo "btn btn-round mr-2"; }else{ echo "btn btn-danger btn-border btn-round mr-2";} ?>">Month</a>        
</div>
</div>
  </div>
</div>
<!-- button in header end -->	
    <div class="row">
                          <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                              <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                  <i class="material-icons">favorite</i>
                                </div>
                                <p class="card-category">Total of Likes</p>
                                 <h3 class="card-title"><?= $count_likes ?></h3>
                              </div>
                              <div class="card-footer">
                                <div class="stats">
                                 
                                </div>
                              </div>
                            </div>
                          </div>

                           <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                              <div class="card-header card-header-rose card-header-icon">
                                <div class="card-icon">
                                  <i class="material-icons">comment</i>
                                </div>
                             <p class="card-category">Total of Comments</p>
                            <h3 class="card-title"><?= $count_comments ?></h3>
                              </div>
                              <div class="card-footer">
                                <div class="stats">
                                 
                                </div>
                              </div>
                            </div>
                          </div>

                           <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                              <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                  <i class="material-icons">create</i>
                                </div>
                               <p class="card-category">Total Post without Link</p>
                            <h3 class="card-title"><?= $count_posting ?></h3>
                              </div>
                              <div class="card-footer">
                                <div class="stats">
                                 
                                </div>
                              </div>
                            </div>
                          </div>

                           <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                              <div class="card-header card-header-succes card-header-icon">
                                <div class="card-icon">
                                  <i class="material-icons">link</i>
                                </div>
                                <p class="card-category">Total Post with Link</p>
                            <h3 class="card-title"><?= $count_link ?></h3>
                              </div>
                              <div class="card-footer">
                                <div class="stats">
                                 
                                </div>
                              </div>
                            </div>
                          </div>
</div>
<!-- row baris 1 start -->

<div class="row">
    <!-- trending topics -->
    <div class="col-md-6">
        <div class="card">
             <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                      <i class="material-icons"></i>
                    </div>
                    <h4 class="card-title">Trending Topic</h4>
                  </div>
            <div class="card-body pb-0">
                <div class="material-datatables">
                          <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <?php  if(!empty($topActivity)){ ?>
                      <thead>
                         <tr>
                <th>Nama Hashtag</th>
                <th>Jumlah</th>
                        </tr>
                      </thead>
        <tbody>
            <?php
        
         foreach($hastagData as $caption => $value){?>

            <tr>
                <td><?= $caption; ?></td>
                <td><?= $value; ?></td>
                
               
              
            </tr>
              <?php }}else{ ?>
                    <h4 class="text-center">-- No Data Found --</h4>
                <?php } ?>
                      </tbody>
                    </table>
                          </div>
                      </div></div></div>
    <!-- top activity -->
    <div class="col-md-6">
        <div class="card">
       <div class="card-header card-header-succes card-header-icon">
                <div class="card-icon">
                      <i class="material-icons">equalizer</i>
                    </div>
                    <h4 class="card-title">Top Activity</h4>
                  </div>
            <div class="card-body pb-0">
                <?php 
                    if(!empty($topActivity)){ 
                        foreach($topActivity as $emp){
                     ?>
                        <div class="d-flex" style="margin-bottom: 1em;">
                            <div class="flex-1 pt-1 ml-2">
                           
                                <h4 class="fw-bold mb-1"><?= $emp['nik'] ?> / <?= $emp['owner_name'] ?></h4>
                                <small class="text-muted" style="font-size:8pt;"><?= $emp['title'] ?></small>
                            </div>
                            <div class="d-flex ml-auto align-items-center">
                                <h3 class="text-info fw-bold"><?= $emp['count_posting'] ?> <small class="text-muted" style="font-size:8pt;">Posts</small></h3>
                            </div>
                        </div>
                <?php }}else{ ?>
                    <h4 class="text-center">-- No Data Found --</h4>
                <?php } ?>
                <br>
            </div>
        </div>
    </div>
</div>

<div class="row">
     <div class="col-md-12">
                     <h3>Most Comment</h3>
                        <br>
                        <div class="row">
                          <?php

                     foreach($mostComments as $row){
                       $url = Helpers::PICTURE_URL.$row['owner_id'];
                      $arrayUrl = @get_headers($url); 
                      if(strpos($arrayUrl[0], "200")) { 
                          $ava = $url;
                      }  
                      else {
                          $ava = Url::base()."/ism/assets/img/default-avatar.png";
                      }

                     ?>


                          <div class="col-md-4">
                            <div class="card card-product">
                              <div class="card-header card-header-image" data-header-animation="true">
                                <a href="">
                          <?php
                            $src = 'data:'.$row->postingDetail['file_type'].';base64,'.$row->postingDetail['file_content'].'';
                            echo '<img src="'.$src.'" alt="" width=200 height=175/>';?>
                                </a>
                              </div>
                              <div class="card-body">
                                <div class="card-actions text-center">
                                  <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                    <i class="material-icons">build</i> Fix Header!
                                  </button>
                                  
                                </div>
                            
                                <h4 class="card-title">
                                    <div class="photo">
            <img src="<?= $ava ?>" style="width: 40px;border-radius: 100%;float: left;border:2px solid #999;margin-left: 10px;margin-top:5px;">
          </div>
                                  <a href="#pablo">   <?php echo $row->owner_name;?></a>
                                </h4>
                                <div class="card-description">
                                 <?php echo $row->caption;?>
                                </div>
                              </div>
                              <div class="card-footer">
                                 <div class="stats">
                                  
                                  <p class="card-category"><i class="material-icons">
                                   <?= Html::a('favorite', ['posting/listlike', 'id' => $row->id_posting]) ?></i> <?php echo $row->like_count;?></p>
                                </div>
                                <div class="stats">
                                  <p class="card-category"><i class="material-icons"><?= Html::a('comment', ['posting/listcomment', 'id' => $row->id_posting]) ?></i> <?php echo $row->comment_count;?></p>
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

                     foreach($mostLikes as $row){
                     $url = Helpers::PICTURE_URL.$row['owner_id'];
                      $arrayUrl = @get_headers($url); 
                      if(strpos($arrayUrl[0], "200")) { 
                          $ava = $url;
                      }  
                      else {
                          $ava = Url::base()."/ism/assets/img/default-avatar.png";
                      }
                     ?>


                          <div class="col-md-4">
                            <div class="card card-product">
                              <div class="card-header card-header-image" data-header-animation="true">
                                <a href="">
                          <?php
                            $src = 'data:'.$row->postingDetail['file_type'].';base64,'.$row->postingDetail['file_content'].'';
                            echo '<img src="'.$src.'" alt="" width=200 height=175/>';?>
                                </a>
                              </div>
                              <div class="card-body">
                                <div class="card-actions text-center">
                                  <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                    <i class="material-icons">build</i> Fix Header!
                                  </button>
                                  
                                </div>
                            
                                <h4 class="card-title">
                                  <a href="#pablo">   <?php echo $row->owner_name;?></a>
                                </h4>
                                <div class="card-description">
                                 <?php echo $row->caption;?>
                                </div>
                              </div>
                              <div class="card-footer">
                                 <div class="stats">
                                  
                                  <p class="card-category"><i class="material-icons">
                                   <?= Html::a('favorite', ['posting/listlike', 'id' => $row->id_posting]) ?></i> <?php echo $row->like_count;?></p>
                                </div>
                                <div class="stats">
                                  <p class="card-category"><i class="material-icons"><?= Html::a('comment', ['posting/listcomment', 'id' => $row->id_posting]) ?></i> <?php echo $row->comment_count;?></p>
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
                     <h3>Most Viewers</h3>
                        <br>
                        <div class="row">
                          <?php

                     foreach($mostViewers as $row){

                     ?>


                          <div class="col-md-4">
                            <div class="card card-product">
                              <div class="card-header card-header-image" data-header-animation="true">
                                <a href="">
                          <?php
                            $src = 'data:'.$row->postingDetail['file_type'].';base64,'.$row->postingDetail['file_content'].'';
                            echo '<img src="'.$src.'" alt="" width=200 height=175/>';?>
                                </a>
                              </div>
                              <div class="card-body">
                                <div class="card-actions text-center">
                                  <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                    <i class="material-icons">build</i> Fix Header!
                                  </button>
                                  
                                </div>
                            
                                <h4 class="card-title">
                                  <a href="#pablo">   <?php echo $row->owner_name;?></a>
                                </h4>
                                <div class="card-description">
                                 <?php echo $row->caption;?>
                                </div>
                              </div>
                              <div class="card-footer">
                                 <div class="stats">
                                  
                                  <p class="card-category"><i class="material-icons">
                                   <?= Html::a('favorite', ['posting/listlike', 'id' => $row->id_posting]) ?></i> <?php echo $row->like_count;?></p>
                                </div>
                                <div class="stats">
                                  <p class="card-category"><i class="material-icons"><?= Html::a('comment', ['posting/listcomment', 'id' => $row->id_posting]) ?></i> <?php echo $row->comment_count;?></p>
                                </div>
                              </div>
                            </div>
                          </div>

                           <?php
                         }
                          ?>
                           </div>
                    </div>
                </div>

<!-- row baris 3 start -->

         
<!-- JS SCRIPT -->
<?php
$script = <<< JS
    $(document).ready(function(){
        //inisiasi filter dashboard today
        function changeData(flag){
            $("#loader").fadeIn(200);
            $("#dashboard-data").html("");
            $.ajax({
                url:$("#url-dashboard-data").val(),
                type: "GET",
                data:"flag="+flag,
                success:function(data){
                    $("#loader").fadeOut(200);
                    $("#dashboard-data").html(data);
                }
            });
        }

        $("#btnToday").click(function(){
            changeData('today');
        });

        $("#btnWeek").click(function(){
            changeData('week');
        });

        $("#btnMonth").click(function(){
            changeData('month');
        });
    });
JS;

$this->registerJs($script);
?> 