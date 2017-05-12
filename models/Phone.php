<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class Phone extends ActiveRecord 
{
    public static function tableName()
    {
        return 'phone';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone'], 'string', 'max' => 225],
        ];
    }
}


