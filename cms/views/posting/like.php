<?php 

use yii\helpers\Html;

$this->title = 'Likes';	
$this->params['breadcrumbs'][] = "Reports";
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
              <h4 class="card-title">Posting Report by Total of Likes</h4>
                </div>
                <div class="card-body">
                  <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                  </div>
                  <div class="material-datatables">
                    <table id="data-tables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%"><thead>
                <tr>
                  <th class="text-center" width="10%">NIK</th>
                  <th class="text-center" width="30%">NAME</th>
                  <th class="text-center">CAPTION</th>
                  <th class="text-center" width="12%">LIKES TOTAL</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $row){ ?>
              <tr>
                  <td class="text-center"><?php echo $row->employee->nik; ?></td>
                  <td><?php echo $row->employee->nama; ?></td>
                  <td><?php echo $row->caption; ?></td>
                  <td class="text-center"><?php echo $row->like_count; ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>  
      </div>

		</div>
	</div>
</div>
