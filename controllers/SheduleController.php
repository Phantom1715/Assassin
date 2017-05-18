<?php
namespace app\controllers;

use app\models\Shedule;
use app\models\Teacher;
use app\models\Clas;
use app\models\Subject;
use app\models\form\SheduleForm;
use yii\helpers\ArrayHelper;
use yii\web\Controller;


class SheduleController extends Controller
{
    public function actionIndex()
    {
        $qery = Shedule::find();
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $qery
        ]);
        return $this->render('index',['provider' => $dataProvider] );
    }

    public function actionCreate()
    {
        $model = new SheduleForm([
            'scenario' => 'add',
        ]);

        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());

            if ($model->run()) {
                return $this->redirect(['shedule/index']);
            }
        }
        return $this->render('form', [
            'model' => $model,
            'classOpts' => ArrayHelper::map(Clas::find()->all(),'id','name'),
            'itemOpts' => ArrayHelper::map(Subject::find()->all(),'id','name'),
            'dayOpts' => ['Понедельник','Вторник','Среда','Четверг','Пятница','Суббота'],
            'lessonsOpts' => ['0','1','2','3','4','5','6','7','8'],
            'teacherOpts' => ArrayHelper::map(Teacher::find()->orderBy(['name_f' => SORT_ASC, 'name' => SORT_ASC, 'name_ot' => SORT_ASC])->all(),'id','fullname'),
        ]);
    }

    public function actionUpdate($id)
    {
        $model = new SheduleForm([
            'scenario' => 'edit'
        ]);
        if($sched = Clas::findOne($id)){
            $sched->id = $this->id;
            $sched->id_item = $this->id_item;
            $sched->id_class = $this->id_class;
            $sched->id_teacher = $this->id_teacher;
            $sched->day_nidely = $this->day_nidely;
            $sched->number_urok = $this->number_urok;
        }

        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
//            $model->image = UploadedFile::getInstance($model, 'image'); // картинки
//            $model->images = UploadedFile::getInstances($model, 'images');

            if ($model->run()) {
                return $this->redirect(['shedule/index']);
            }
        }

        return $this->render('form', [
            'model' => $model,
            'classOpts' => ArrayHelper::map(Clas::find()->all(),'id','name'),
            'itemOpts' => ArrayHelper::map(Subject::find()->all(),'id','name'),
            'teacherOpts' => ArrayHelper::map(Teacher::find()->orderBy(['name_f' => SORT_ASC, 'name' => SORT_ASC, 'name_ot' => SORT_ASC])->all(),'id','fullname'),
        ]);
    }

    public function actionDelete($id)
    {
        Shedule::deleteAll(['id' => $id]);

        return $this->redirect(['shedule/index']);
    }
}