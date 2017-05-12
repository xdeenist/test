<h1>Update</h1>
<p>Please fill out the following fields:</p>

<?php
	$this->title = 'Update';
	$this->params['breadcrumbs'][] = $this->title;
    $this->params['breadcrumbs'][] = 'Update';

?>
<script src="/web/js/jquery-3.2.1.min.js"></script>

<div class="update">
    
    <?= $this->render('_form', [
        'model' => $model,
        'phones' => $phones,
    ]) ?>



</div>