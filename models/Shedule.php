<?php

namespace app\models;

class Shedule extends \yii\db\ActiveRecord {
    public static function tableName() {
        return 'schedule';
    }

    public function  rules() {
        return [
            [['id_item','id_class','id_teacher','day_nidely','number_urok'],'required'],
            [['number_urok'],'integer', 'min' => 1 , 'max' => 8],
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

}