<?php
namespace app\controllers;

use app\models\Clas;
use yii\web\Controller;
use app\models\form\ClassForm;

class ClassController extends Controller
{
    public function actionIndex()
    {
        $qery = Clas::find();
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $qery
        ]);
        return $this->render('index',['provider' => $dataProvider] );
    }

    public function actionCreate()
    {
        $model = new ClassForm([
            'scenario' => 'add'
        ]);

        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());

            if ($model->run()) {
                return $this->redirect(['class/index']);
            }
        }

        return $this->render('form', [
            'model' => $model
        ]);
    }

    public function actionUpdate($id)
    {
        $model = new ClassForm([
            'scenario' => 'edit'
        ]);
        if($class = Clas::findOne($id)){
            $model->id = $class->id;
            $model->name = $class->name;
            $model->id_uchitel = $class->id_uchitel;
        }

        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
//            $model->image = UploadedFile::getInstance($model, 'image'); // картинки
//            $model->images = UploadedFile::getInstances($model, 'images');

            if ($model->run()) {
                return $this->redirect(['class/index']);
            }
        }

        return $this->render('form', [
            'model' => $model
        ]);
    }

    public function actionDelete($id)
    {
        Clas::deleteAll(['id' => $id]);

        return $this->redirect(['class/index']);
    }
}