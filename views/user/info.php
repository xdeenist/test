<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */
// print_r($countOwner); die();
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'User Info';
?>

<?php $form = ActiveForm::begin()?>
<div class="site-login">
    <h1><?php echo $userInfo['username'] ?> info:</h1>
    <div class="row">
        <div class="col-sm-4 col-md-8">
            <div class="thumbnail">
                <div class="caption">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-success">Username :: <?php echo $userInfo['username']?></li>
                        <li class="list-group-item list-group-item-info">E-Mail :: <?php echo $userInfo['email']?> </li>
                        <li class="list-group-item list-group-item-info">User status :: <?php echo $userInfo['userstatus']?></li>
                        <li class="list-group-item list-group-item-info">Register date :: <?php echo $userInfo['regdata']?></li>
                        <li class="list-group-item list-group-item-info">Count tasks when owner :: <?php echo $countOwner?></li>
                        <li class="list-group-item list-group-item-info">Count tasks when employer :: <?php echo $countEmployer?></li>
                        <li class="list-group-item list-group-item-info">Count tasks in work :: <?php echo $countInWork?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>   
</div>
<?php ActiveForm::end(); ?>
