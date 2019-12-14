
<?php 

use yii\helpers\Html;

$this->title = 'Detail Groups';	
$this->params['breadcrumbs'][] = ['label' => 'Groups Management', 'url' => ['group/index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="row">
	<div class="col-md-12">
		<div class="card">    
      <!-- header -->
      <div class="card-header">
				<div class="d-flex align-items-center">
					<h4 class="card-title">Detail Groups Data</h4>
				</div>
      </div>
        
      <!-- body -->
			<div class="card-body">
        <div class="table-responsive">
          <table id="tables-data" class="display table table-striped table-hover">
            <thead>
                <tr>
                  <th class="text-center" width="10%">NIK</th>
                  <th class="text-center" width="25%">NAME MEMBER</th>
                  <th class="text-center">GROUP NAME</th>
                  <th class="text-center" width="15%">JOIN AT</th>
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
                          ['class' => 'btn btn-link btn-primary', 'title' => 'View Data']) 
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