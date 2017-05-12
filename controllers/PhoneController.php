<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\rest\CreateAction;
use yii\web\Controller;
use app\models\Phonebook;
use app\models\Phone;
use yii\filters\VerbFilter;

class PhoneController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {  
        $model = new Phonebook();
        $post = Yii::$app->request->post();
        if ($post) {
            $phones = isset($post['phone']) ? $post['phone'] : null;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $newid = $model->phonebook_id;
            $upd = Phonebook::findOne($newid);
            $upd->user_id = Yii::$app->user->id;
            $upd->update();
            if($phones){
                $this->loadPhones($phones, $newid);
            }

            return $this->redirect('/phone/view' . "/" . $newid);

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function loadPhones($phones, $newid){
        foreach ($phones as $value) {
            $model = new Phone();
            $model->phone = $value;
            $model->phonebook_id = $newid;
            if ($model->phone) {
                $model->save();
            }            
        }
    }

    public function actionRemovePhones()
    {
        $ph_id = Yii::$app->request->post('ph_id', null);
        $model = Phone::findOne($ph_id);
        if($model && $model->delete()){
            return true;
        }
    }

    public function actionUpdate($id){
        $post = Yii::$app->request->post();
        $postPhones = isset($post['phone']) ? $post['phone'] : null;
        $model = Phonebook::findOne($id);
        $phones = Phone::find()->where(['phonebook_id' => $model->phonebook_id])->all();
        if ($model->user_id != Yii::$app->user->id) {
            return $this->redirect('/user/phonebook');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $upd = Phonebook::findOne($id);
            $upd->user_id = Yii::$app->user->id;
            $upd->update();

            if($postPhones){
                $this->loadPhones($postPhones, $id);
            }

            return $this->redirect('/phone/view'. "/" . $model->phonebook_id);
        } else {
            return $this->render('update', [
                'model' => $model,
                'phones' => $phones,
            ]);
        }
    }

    public function actionPhonebook(){
        $model = new Phonebook();
        $names = $model->find()->where(['user_id' => Yii::$app->user->id])->all();
        return $this->render('phonebook', [
                'names' => $names,
            ]);
    }

    public function actionView($id){
        $modelBook = new Phonebook();
        $modelPhone = new Phone();
        $name = $modelBook->findOne($id);
        $phones = $modelPhone->find()->where(['phonebook_id' => $name->phonebook_id])->asArray()->all();
        return $this->render('view', [
                'name' => $name,
                'phones' => $phones,
            ]);
    }

}
