<?php

namespace app\models;
namespace app\models\Subject;

use app\models\Subject;

class Shedule extends \yii\db\ActiveRecord {
    public static function tableName() {
        return 'schedule';
    }

    public function  rules() {
        return [
            [['id_item','id_class','id_teacher','day_nidely','number_urok'],'required'],
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
     public function getItem($id){
        $item = Subject::findOne($id);
     }

}