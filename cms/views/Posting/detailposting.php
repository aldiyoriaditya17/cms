<?php 

use yii\helpers\Html;
?>

<div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">Detail Posting</h4>
                </div>
                <div class="card-body">
                  <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                  </div>
                  <div class="material-datatables">
                          

                   <table id="bootstrap-data-table" class="table table-striped table-bordered">
                  <?php foreach($data as $row){?>
  
                    <tr>
            <td width="350">ID Posting</td>
            <td><?php echo $row['id_posting'];?></td>
          </tr>
          <tr>
            <td>Owner ID</td>
            <td><?php echo $row['owner_id'];?></td>
          </tr>
          <tr>
            <td>Owner Name</td>
          <td><?php echo $row['owner_name'];?></td>
          </tr>
          <tr>
            <td>Caption</td>
          <td><?php echo $row['caption'];?></td>
          </tr>
           <tr>
            <td>Views Count</td>
          <td><?php echo $row['views_count'];?></td>
          </tr>
          <tr>
            <td>Like Count</td>
          <td><?php echo $row['like_count'];?></td>
          </tr>
          <tr>
            <td>Comment Count</td>
          <td><?php echo $row['comment_count'];?></td>
          </tr>
          <tr>
            <td>Created At</td>
          <td><?php echo $row['created_at'];?></td>
          </tr>
          <?php if ($row['file_type'] == 'image/jpeg')
          {
            ?>
          <tr>
            <td>Content</td>
          <td><?php echo '<img src="data:'.$row['file_type'].';base64,'.base64_encode( $row['file_content'] ).'" width=200 height=200/>';?></td>
          </tr>
          <?php }
          else
          {

          }?>
      </table>
      <?php
  }?>


            
                  </div>
                </div>
                <!-- end content-->
              </div>
              <!--  end card  -->
            </div>