<?php

namespace cms\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class DashboardAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

      'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons',
      'ism/maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css',
      'ism/assets/css/material-dashboard.minf066.css',
      'ism/assets/demo/demo.css',
    ];


    public $js = [
          'ism/assets/demo/jquery.sharrre.js',
          'ism/assets/js/core/jquery.min.js',
          'ism/assets/js/core/popper.min.js',
          'ism/assets/js/core/bootstrap-material-design.min.js',
          'ism/assets/js/plugins/perfect-scrollbar.jquery.min.js',
          'ism/assets/js/plugins/moment.min.js',
          'ism/assets/js/plugins/sweetalert2.js',           
          'ism/assets/js/plugins/jquery.validate.min.js',
          'ism/assets/js/plugins/jquery.bootstrap-wizard.js',
          'ism/assets/js/plugins/bootstrap-selectpicker.js',
          'ism/assets/js/plugins/bootstrap-datetimepicker.min.js',
          'ism/assets/js/plugins/jquery.dataTables.min.js', 
          'ism/assets/js/plugins/bootstrap-tagsinput.js',
          'ism/assets/js/plugins/jasny-bootstrap.min.js',
          'ism/assets/js/plugins/fullcalendar.min.js',
          'ism/assets/js/plugins/jquery-jvectormap.js',
             
             'ism/assets/js/plugins/nouislider.min.js',
             'ism/cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js',
             'ism/assets/js/plugins/arrive.min.js',
             'https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU',
             'ism/buttons.github.io/buttons.js',
             'ism/assets/js/plugins/chartist.min.js',
             'ism/assets/js/plugins/bootstrap-notify.js',
             'ism/assets/js/material-dashboard.minf066.js?v=2.1.0',
             'ism/assets/js/material-dashboard.minf066.js?v=2.1.0',
             'ism/assets/demo/jquery.sharrre.js',
             'ism/last.js',
             'ism/last2.js',
          
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}




