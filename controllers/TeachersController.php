<?php
namespace app\controllers;

use app\models\Teacher;
use yii\web\Controller;
use app\models\form\TeacherForm;

class TeachersController extends Controller
{
    public function actionIndex()
    {
        $qery = Teacher::find();
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $qery
        ]);
            return $this->render('index',['provider' => $dataProvider] );
    }

    public function actionCreate()
    {
        $model = new TeacherForm([
            'scenario' => 'add'
        ]);

        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
//            $model->image = UploadedFile::getInstance($model, 'image'); // картинки
//            $model->images = UploadedFile::getInstances($model, 'images');

            if ($model->run()) {
                return $this->redirect(['teachers/index']);
            }
        }

        return $this->render('form', [
            'model' => $model
        ]);
    }

    public function actionEdit()
    {

    }

    public function actionDelete()
    {

    }
}