<?php

/* @var $this \yii\web\View */
/* @var $content string */

use cms\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;



$asset = cms\assets\AppAsset::register($this);
$baseUrl = $asset->baseUrl;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
  <link rel="apple-touch-icon" sizes="76x76" href="<?=$baseUrl?>/ism/assets/img/telkom.png">
  <link rel="icon" type="image/png" href="<?=$baseUrl?>/ism/assets/img/telkom.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<head>
    <title>CMS ISM & MOANA</title>
     <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<?php $this->beginBody() ?>
<body>
     <div class="main">
    <?=$content?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
