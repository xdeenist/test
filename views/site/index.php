<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Hello!</h1>

        <p class="lead">Please login to use this application.</p>

        <p><a class="btn btn-lg btn-success" href="<?php echo Url::to(['user/login']);?>">Get started</a></p>
    </div>

    <div class="body-content">

    </div>
</div>
