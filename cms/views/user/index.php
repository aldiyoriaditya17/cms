<?php 

use yii\helpers\Html;

$this->title = 'Users Management';	
$this->params['breadcrumbs'][] = $this->title;

//validasi notification
if(Yii::$app->session->has('success-notif')){
  $icon_notif = "fas fa-check-circle";
  $flag_notif = "Success";
  $content_notif = Yii::$app->session->get('success-notif');
  $visible_notif = 1;
}elseif(Yii::$app->session->has('error-notif')){
  $icon_notif = "fas fa-times-circle";
  $flag_notif = "Error";
  $content_notif = Yii::$app->session->get('error-notif');
  $visible_notif = 1;
}else{
  $icon_notif = "";
  $flag_notif = "";
  $content_notif = "";
  $visible_notif = 0;
}
?>

<!-- hidden input for notification -->
<input type="hidden" id="icon_notif" value="<?= $icon_notif ?>" />
<input type="hidden" id="flag_notif" value="<?= $flag_notif ?>" />
<input type="hidden" id="content_notif" value="<?= $content_notif ?>" />
<input type="hidden" id="visible_notif" value="<?= $visible_notif ?>" />


<div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">Data User</h4>
                </div>



                <div class="card-body">
                  <div class="toolbar"><br>
                    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-danger btn-round']) ?>
    </p>
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                  </div>
                  <div class="material-datatables">
                    <table id="tables-data" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
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
                  
                     <i class="material-icons" style="color:red;"> <?= Html::a('input', ['class' => 'btn text-danger','update', 'id' => $row['id']]) ?>
                      <?= Html::a('delete', ['delete', 'id' => $row['id']], [
           
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    
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

<!-- JS SCRIPT -->
<?php
$script = <<< JS
    $(document).ready(function(){
			$("#tables-data").DataTable({
        "order": [[ 2, "asc" ]],
			});

      //Notify
      if($("#visible_notif").val() == "1" || $("#visible_notif").val() == 1){
        $.notify({
          icon: $("#icon_notif").val(),
          title: $("#flag_notif").val(),
          message: $("#content_notif").val(),
        },{
          type: ($("#flag_notif").val() == "Error") ? "danger" : $("#flag_notif").val().toLowerCase(),
          placement: {
            from: "top",
            align: "right"
          },
          time: 1000,
        });
      }
		});
JS;

$this->registerJs($script);
?>  