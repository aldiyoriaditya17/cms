
<?php 

use yii\helpers\Html;
?>

<div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">Data Group</h4>
                </div>
                <div class="card-body">
                  <div class="toolbar">
                        
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                  </div>
                  <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                      <thead>
                         <tr>
                         
                <th>Group Name</th>
                <th>Member ID</th>
                 <th>Member Name</th>
                <th>Join At</th>
           
              
                        </tr>
                      </thead>
        <tbody>
            <?php foreach ($data as $row) : ?>
            <tr>
               
                <td><?php echo $row['group_name']; ?></td>
                <td><?php echo $row['id_member']; ?></td>
                <td><?php echo $row['member_name']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
              
              
            </tr>
             <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- end content-->
              </div>
              <!--  end card  -->
            </div>