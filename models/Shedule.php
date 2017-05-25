<?php

namespace app\models;

use app\models\Teacher;
use app\models\Clas;
use app\models\Subject;
use yii\helpers\ArrayHelper;


class Shedule extends \yii\db\ActiveRecord {
    public static function tableName() {
        return 'schedule';
    }

    public function  rules() {
        return [
            [['id_item','id_class','id_teacher','day_nidely','number_urok'],'required'],
            [['id_item','id_class','id_teacher'],'string','min'=>2],
            [['day_nidely','number_urok'],'integer','min'=>0],
        ];
    }

    public function attributeLabels() {
        return [
            'id_item' => 'Item',
            'id_class' => 'Class',
            'id_teacher' => 'Teacher',
            'day_nidely' => 'Day',
            'number_urok' => 'Lesson'
        ];
    }
     public function getItem() {
         return $this->hasOne(Subject::className(), ['id' => 'id_item']);
     }
    public function getClass(){
        return $this->hasOne(Clas::className(),['id' => 'id_class']);
    }
    public function getTeacher(){
        return $this->hasOne(Teacher::className(),['id' => 'id_teacher']);
    }
}