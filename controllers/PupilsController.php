<?php
namespace app\controllers;

use app\models\Pupils;
use yii\web\Controller;
use app\models\form\PupilsForm;

class PupilsController extends Controller
{
    public function actionIndex()
    {
        $qery = Pupils::find();
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $qery
        ]);
        return $this->render('index',['provider' => $dataProvider] );
    }

    public function actionCreate()
    {
        $model = new PupilsForm([
            'scenario' => 'add'
        ]);

        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
            
            if ($model->run()) {
                return $this->redirect(['pupils/index']);
            }
        }

        return $this->render('form', [
            'model' => $model
        ]);
    }

    public function actionUpdate($id)
    {
        $model = new PupilsForm([
            'scenario' => 'edit'
        ]);
        if($pupils = Pupils::findOne($id)){
            $pupils->name = $this->name;
            $pupils->name_ot = $this->name_ot;
            $pupils->name_f = $this->name_f;
            $pupils->birth = $this->birth;
            $pupils->id_class = $this->id_class;
        }

        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());

            if ($model->run()) {
                return $this->redirect(['pupils/index']);
            }
        }

        return $this->render('form', [
            'model' => $model
        ]);
    }

    public function actionDelete($id)
    {
        Pupils::deleteAll(['id' => $id]);

        return $this->redirect(['pupils/index']);
    }
}