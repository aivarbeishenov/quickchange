<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\datetime\DateTimePicker;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'full_name') ?>

                <?= $form->field($model, 'citizenship') ?>

                <?= $form->field($model, 'phone_number') ?>

                <?= $form->field($model, 'passport_id') ?>

                <?= $form->field($model, 'passport_validity')->widget(DateTimePicker::className(),[
                    'name' => 'dp_1',
                    'type' => DateTimePicker::TYPE_INPUT,
                    'options' => ['placeholder' => 'Ввод даты ММ.ГГГГ'],
                    'convertFormat' => true,
                    'value'=> date("m.Y",(int) $model->passport_validity),
                    'pluginOptions' => [
                        'format' => 'MM.yyyy',
                        'autoclose'=>true,
                        'startView'=>3,
                        'minView'=>3,
                        'maxminView'=>4,
                        'weekStart'=>1, //неделя начинается с понедельника
                        'todayBtn'=>true, //снизу кнопка "сегодня"
                    ]
                        ]) ?>

                <?= $form->field($model, 'passport_authority') ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
