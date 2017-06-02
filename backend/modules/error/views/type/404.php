<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\AppAsset;
AppAsset::register($this);
use richardfan\widget\JSRegister;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <title>404 | Page Not Found</title>
    
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="container-fluid">
         <div class="thumbnail" style="border: 0 none; box-shadow: none;">
            <img src="<?php echo Url::base('').'/'.'img/error/404.gif';?>" class="image-responsive" width="650">
         </div>
         <div class="row">
            
            <!-- <button onclick="history.back()" class="btn btn-primary btn-sm pull-left"><span class="glyphicon glyphicon-chevron-left"></span><span class="glyphicon glyphicon-chevron-left"></span>Back</button> -->
         </div>
      </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>