<?php
namespace app\controllers;

use app\models\Pupils;
use yii\base\Exception;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use app\models\Clas;
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
            'model' => $model,
            'classOpts' => ArrayHelper::map(
                Clas::find()->all(),
                'id',
                'name'
            )
        ]);
    }

    public function actionUpdate($id)
    {
        $model = new PupilsForm([
            'scenario' => 'edit',
            'id' => $id
        ]);

        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());

            if ($model->run()) {
                return $this->redirect(['pupils/index']);
            }
        }

        if($pupils = Pupils::findOne($id)){
            $model->name = $pupils->name;
            $model->name_ot = $pupils->name_ot;
            $model->name_f = $pupils->name_f;
            $model->birth = $pupils->birth;
            $model->id_class = $pupils->id_class;
        }

        return $this->render('form', [
            'model' => $model,
            'classOpts' => ArrayHelper::map(
            Clas::find()->all(),
        'id',
        'name'
            )

        ]);
    }

    public function actionDelete($id)
    {

        $transaction = \Yii::$app->db->beginTransaction();

        try {
            $pupils = Pupils::findOne($id);
            if (!$pupils->delete()) {
                throw new Exception();
            };

            $class = Clas::findOne($pupils->id_class);
            $class->chislo_uch -= 1;
            if (!$class->save()) {
                throw new Exception();
            }

            $transaction->commit();
        } catch(Exception $e) {
            $transaction->rollBack();
        }

        return $this->redirect(['pupils/index']);
    }
}