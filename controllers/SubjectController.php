<?php
namespace app\controllers;

use app\models\Subject;
use yii\web\Controller;
use app\models\form\SubjectForm;

class SubjectController extends Controller
{
    public function actionIndex()
    {
        $qery = Subject::find();
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $qery
        ]);
        return $this->render('index',['provider' => $dataProvider] );
    }

    public function actionCreate()
    {
        $model = new SubjectForm([
            'scenario' => 'add'
        ]);

        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());

            if ($model->run()) {
                return $this->redirect(['subject/index']);
            }
        }

        return $this->render('form', [
            'model' => $model
        ]);
    }

    public function actionUpdate($id)
    {
        $model = new SubjectForm([
            'scenario' => 'edit'
        ]);
        if($subject = Subject::findOne($id)){
            $model->id = $subject->id;
            $model->name = $subject->name;
        }

        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());

            if ($model->run()) {
                return $this->redirect(['subject/index']);
            }
        }

        return $this->render('form', [
            'model' => $model
        ]);
    }

    public function actionDelete($id)
    {
        Subject::deleteAll(['id' => $id]);

        return $this->redirect(['subject/index']);
    }
}