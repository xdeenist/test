<h1>Create</h1>
<p>Please fill out the following fields:</p>

<?php
	$this->title = 'Create';
	$this->params['breadcrumbs'][] = $this->title;
    $this->params['breadcrumbs'][] = 'Create';
?>
<script src="/web/js/jquery-3.2.1.min.js"></script>

<div class="create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>



</div>