<?php
namespace app\controllers;

use app\models\Clas;
use app\models\Teacher;
use yii\helpers\ArrayHelper;
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
            'scenario' => 'add',
            'chislo_uch' => 0
        ]);

        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());

            if ($model->run()) {
                return $this->redirect(['class/index']);
            }
        }

        return $this->render('form', [
            'model' => $model,
            'teachersOpts' => ArrayHelper::map(
                Teacher::find()
                    ->orderBy(['name_f' => SORT_ASC, 'name' => SORT_ASC, 'name_ot' => SORT_ASC])
                    ->all(),
                'id',
                'fullName'
            )
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
            $model->chislo_uch = $class->chislo_uch;
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
            'model' => $model,
            'teachersOpts' => ArrayHelper::map(
                Teacher::find()
                    ->orderBy(['name_f' => SORT_ASC, 'name' => SORT_ASC, 'name_ot' => SORT_ASC])
                    ->all(),
                'id',
                'fullName'
            )
        ]);
    }

    public function actionDelete($id)
    {
        Clas::deleteAll(['id' => $id]);

        return $this->redirect(['class/index']);
    }
}