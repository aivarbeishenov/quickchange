<?php
/**
 * Created by PhpStorm.
 * User: Фатима
 * Date: 07.08.2018
 * Time: 20:35
 */

namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Transaction;

class AccountController extends Controller
{

    public function actionTransaction()
    {
        $array = Transaction::findAll(Yii::$app->user->getId());
        var_dump($array);
        return $this->render('transaction',['varInView'=>$array]);
    }

}