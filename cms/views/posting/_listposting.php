<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\components\Helpers;


?>

<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
            <h4 class="card-title">Filter Tags </h4>
      </div>
      <div class="card-body">
      <div class="filter-tags" style="margin-top:-30px;">
                          <div class="form-inline">
                      
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-tags"></i></span>
                                </div>
                                <input type="text" class="form-control" name="tags" id="tags-input">
                            </div>  
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="date" class="form-control" name="start_date" id="start_date_tag">
                            </div>  
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="date" class="form-control" name="end_date" id="end_date_tag">
                            </div>  
                            <div class="input-group mb-3">
                                <button id="btn-filter-tag" class="ml-2 mt-3 d-4 btn btn-danger btn-border btn-round mr-2" type="button"><i class="fa fa-search"></i></button>
                            </div>  
                          </div>
                        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
<div class="col-lg-12">
              <div class="card">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">Data User</h4>
                </div>


                <div class="card-body">
                  <!-- <input type="text" id="temptag"> -->
                  <div class="material-datatables">
                    <table id="data-tables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
            <thead>
                <tr>
                  <th class="text-center" width="8%">NIK</th>
                  <th class="text-center" width="15%">NAME</th>
                  <th class="text-center">CAPTION</th>
                  <th class="text-center" width="10%">VIEWS</th>
                  <th class="text-center" width="10%">LIKES</th>
                  <th class="text-center" width="10%">COMMENTS</th>
                  <th class="text-center" width="15%">CREATED AT</th>
                  <th class="text-center" width="5%">ACTION</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $row){ ?>
              <tr>
                  <td class="text-center"><?php echo $row->owner_id ?></td>
                  <td><?php echo $row->owner_name; ?></td>
                  <td><?php echo $row->caption; ?></td>
                  <td class="text-center"><?php echo $row->views_count; ?></td>
                  <td class="text-center"><?php echo $row->like_count; ?></td>
                  <td class="text-center"><?php echo $row->comment_count; ?></td>
                  <td><?php echo date("d-m-Y H:i",strtotime($row->created_at)); ?></td>
                  <td>
                      <i class="material-icons"> <?= Html::a('visibility', ['detail', 'id' => $row['id_posting']]) ?>
                        
						      </div>
                  </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>  
      </div>

		</div>
	</div>
</div>
</div>
