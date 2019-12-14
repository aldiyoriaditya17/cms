<?php 

use yii\helpers\Html;

$this->title = 'Groups Management';	
$this->params['breadcrumbs'][] = $this->title;

?>

		<div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">Data User</h4>
                </div>
        
      <!-- body -->
			<div class="card-body">
        <div class="table-responsive">
          <table id="tables-data" class="display table table-striped table-hover">
            <thead>
                <tr>
                  <th class="text-center" width="10%">NIK</th>
                  <th class="text-center" width="25%">NAME</th>
                  <th class="text-center">GROUP NAME</th>
                  <th class="text-center" width="15%">CREATED AT</th>
                  <th class="text-center" width="5%">ACTION</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $row){ ?>
              <tr>
                  <td class="text-center"><?php echo $row->employee->nik; ?></td>
                  <td><?php echo $row->employee->nama; ?></td>
                  <td><?php echo $row->group_name; ?></td>
                  <td><?php echo date("d-m-Y H:i",strtotime($row->created_at)); ?></td>
                  <td>
                    <div class="form-button-action">
											<?= Html::a('<i class="fas fa-eye text-primary"></i>', 
                          ['detail', 'id' => $row->id_group],
                          ['class' => 'btn btn-link btn-primary', 'title' => 'View Detail']) 
                      ?>
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

<!-- JS SCRIPT -->
<?php
$script = <<< JS
    $(document).ready(function(){
			$("#tables-data").DataTable({
        "order": [[ 3, "desc" ]]  
			});
		});
JS;

$this->registerJs($script);
?>  