<?php
/**
 * Created by PhpStorm.
 * User: Фатима
 * Date: 07.08.2018
 * Time: 21:38
 */
namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Transaction extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%transaction}}';
    }

    public static function findAll($account_id)
    {
        return static::findAll(['account_id'=>$account_id]);
    }
}