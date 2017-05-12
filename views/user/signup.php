<h1>Register</h1>
<p>Please fill out the following fields to signup:</p>

<?php 
	use \yii\widgets\ActiveForm;
	$this->title = 'Register';
	$this->params['breadcrumbs'][] = $this->title;
?>


<?php 
	$form = ActiveForm::begin(['class' => 'form-horisontal']);
?>

<?= $form->field($model,'username')->textInput(['autofocus'=>true]) ?>


<?= $form->field($model,'email')->textInput(['autofocus'=>true]) ?>


<?= $form->field($model,'password')->passwordInput()?>

<div class="site-login">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>

<?php
	ActiveForm::end();
?>