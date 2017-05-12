<?php
use \yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'My Phonebook';
$this->params['breadcrumbs'][] = $this->title;
?>

<p><h3>My Phonebook: </h3></p>
<a href="<?php echo Url::to(['phone/create']) ?>" class="btn btn-default col-md-2" style="margin-left: 200px; margin-top: -45px" >Create new contact</a>
<div class="site-login">
    <div class="row">
        <div class="col-sm-5 col-md-9">
            <div class="thumbnail">
                <div class="caption">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-success">Names: </li>                        
                        <?php if ($names) {                        
                            foreach ($names as $value) { ?>
   						   <li class="list-group-item list-group-item-info"><a href="<?php echo Url::to(['phone/view']) . "/" . $value->phonebook_id; ?>"><?php echo $value->name ?> <?php echo $value->surname ?> <?php echo $value->patronymic ?></a></li>
						<?php
                            } 
                        } 
                        ?>
               		</ul>
                </div>
            </div>
        </div>
    </div>
</div>