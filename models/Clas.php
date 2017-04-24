<?php

namespace app\models;

class Clas extends \yii\db\ActiveRecord {
    public static function tableName() {
        return 'class';
    }

    public function  rules() {
        return [
            [['name'],'required'],
            [['name'],'string','max' => 100],
        ];
    }

    public function attributeLabels() {
        return [
            'name' => 'Name',
            'chislo_uch' => 'Count',
            'id_uchitel' => 'Teacher',
        ];
    }

}