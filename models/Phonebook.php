<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class Phonebook extends ActiveRecord 
{
    public static function tableName()
    {
        return 'phonebook';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['surname'], 'string', 'max' => 100],
            [['patronymic'], 'string', 'max' => 100],
        ];
    }

    public function attributeLabels()
    { 
        return [
            'name' => 'Name',
            'surname' => 'Surname',
            'patronymic' => 'Patronymic',
        ];
    }
}


