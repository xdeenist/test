<?php
use yii\helpers\Url;
	$this->title = 'View';
	$this->params['breadcrumbs'][] = $this->title;
    $this->params['breadcrumbs'][] = $name->name  ." ". $name->surname;
?>

<div class="view-phones">
    <h1><?php echo $name->name ?> info:</h1>
    <a href="<?php echo Url::to(['phone/update']) . "/" . $name->phonebook_id; ?>" class="btn btn-default col-md-1" style="margin-left: 200px; margin-top: -45px" >Edit</a>
    <div class="row">
        <div class="col-sm-4 col-md-8">
            <div class="thumbnail">
                <div class="caption">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-success">Name :: <?php echo $name->name?></li>
                        <li class="list-group-item list-group-item-success">Surname :: <?php echo $name->surname?> </li>
                        <li class="list-group-item list-group-item-success">Patronymic :: <?php echo $name->patronymic?> </li>
                        <li class="list-group-item list-group-item-warning">Phones :: </li>
                        <?php 
                            // var_dump($phones); die();
                            for ($i=0; $i < count($phones); $i++) { ?>
                                <li class="list-group-item list-group-item-success"><a href="tel:<?php echo $phones[$i]['phone']?>"><?php echo $phones[$i]['phone']?></a> </li>                                
                          <?php  }
                         ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>   
</div>