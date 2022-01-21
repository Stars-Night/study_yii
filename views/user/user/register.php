<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\user\UserRegisterModel */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = '注册';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-register">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>请填写以下字段进行注册：</p>

    <?php $form = ActiveForm::begin([
        'id' => 'register-form',
        'action' => \yii\helpers\Url::to('/user/user/add-user'),
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'password2')->passwordInput() ?>
        <?= $form->field($model, 'email')->textInput() ?>
        <?= $form->field($model, 'phone')->textInput() ?>
        <?= $form->field($model, 'address')->textInput() ?>

        <div class="form-group">
            <div class="offset-lg-1 col-lg-11">
                <?= Html::submitButton('注册', ['class' => 'btn btn-primary', 'name' => 'register-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

    <script src="/js/jquery/jquery.js"></script>
    <script>
    $(function () {
    var $form = $('#register-form');
    $form.on('beforeSubmit', function() {
        var data = $form.serialize();
        $.ajax({
            url: $form.attr('action'),
            type: 'POST',
            data: data,
            success: function (data) { // 状态码为200
                if (data.code == 0) {
                    console.log('成功')
                    $(location).attr('href', '/user/user/login');
                } else {
                    console.log('失败')
                    console.log(data)
                }
            },
            error: function(jqXHR, errMsg) {
                console.log('失败')
                console.log(errMsg)
            }
        });
        return false; // 防止默认提交
    });
    });
    </script>
</div>
