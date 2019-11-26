<?php 

use yii\helpers\Html;
?>

<div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">Data User</h4>
                </div>



                <div class="card-body">
                  <div class="toolbar"><br>
                    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-primary btn-round']) ?>
    </p>
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                  </div>
                  <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                      <thead>
                         <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row) : ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['email']; ?></td>
               
                <td>
                  <p>
        <?= Html::a('Edit', ['update'], ['class' => 'btn btn-info']) ?>
         <?= Html::a('Delete', ['delete'], ['class' => 'btn btn-danger']) ?>
    </p>
                </td>
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