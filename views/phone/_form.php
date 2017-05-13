<script src="/web/js/jquery-3.2.1.min.js"></script>
<?php
use yii\helpers\Url;
use \yii\widgets\ActiveForm;
use \app\models\User;
use yii\helpers\Html;


$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>


<!-- Upload URL -->
<div class="input-group control-group after-add-more">


    <input type="text" name="phone[]" class="form-control" placeholder="Enter Phone Here">
    <div class="input-group-btn">
        <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
    </div>
</div>


<div class="copy-fields hide" >
    <div class="control-group input-group" style="margin-top:10px">
        <input type="text" name="phone[]" class="form-control phone-field" placeholder="Enter Phone Here">
        <div class="input-group-btn">
            <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
        </div>
    </div>
</div>

<br/>
<!--     <br/>
    <br/> -->

<?php if (isset($phones)) {
    foreach ($phones as $val) { if (!empty($val->phone)){
    echo "<div>".Html::tag('a', $val->phone, ['class' => 'phonn']) . " " . "<a href='#' class='rem_res glyphicon glyphicon-trash' ph_id='". $val->phone_id ."'></a> <a href='#' class='upd_res glyphicon glyphicon-pencil' phn_id='". $val->phone_id ."' value='" . $val->phone . "'></a></div><br/>";
}}}?>


<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

<script>

    $(document).ready(function() {

                    //add
        $(".add-more").click(function(){
            if (document.getElementsByClassName('phone-field').length <= 10) {
                var html = $(".copy-fields").html();
                $(".after-add-more").after(html);
            } else { alert('Not more than 10 phone numbers!')}            
        });

            // Remove 
        $("body").on("click",".remove",function(){
            $(this).parents(".control-group").remove();
        });


        $('.rem_res').click(function () {

            var ph = $(this);
            var ph_id = ph.attr('ph_id');
            console.log(ph_id )
            $.ajax({
                url: '<?php echo Url::toRoute('remove-phones'); ?>',
                data: {'ph_id': ph_id},
                method: 'post',
                success: function(data){
                    ph.parent().remove();
                }
            });

            return false;
        });

        $('.upd_res').click(function () {

            var phn = $(this);
            var phn_id = phn.attr('phn_id');
            var phn_val = phn.attr('value');
            
            $.ajax({
                url: '<?php echo Url::toRoute('remove-phones'); ?>',
                data: {'ph_id': phn_id},
                method: 'post',
                success: function(data){
                    phn.parent().remove();
                }
            });
            var html = $(".copy-fields").html();
            // $(".copy-fields").attr('id', phn_id);
            // console.log(html);
            $(".after-add-more").after('<div class="control-group input-group" style="margin-top:10px">'+
                '<input type="text" name="phone[]" class="form-control phone-field" id="'+ phn_id +'" placeholder="Enter Phone Here">'+
                '<div class="input-group-btn">'+
                '<button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove">'+
                '</i> Remove</button>'+
                '</div>'+
                '</div>');
            $('#'+phn_id).val(phn_val);
            return false;
        });
    });
</script>



</div>