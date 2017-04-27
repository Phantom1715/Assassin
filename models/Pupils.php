<?php

namespace app\models;

class Pupils extends \yii\db\ActiveRecord {
    public static function tableName() {
        return 'pupils';
    }

    public function  rules() {
        return [
            [['name','name_f','name_ot'],'required'],
            [['name','name_f','name_ot'],'string','max' => 100],
            [['birth'],'safe']
        ];
    }

    public function attributeLabels() {
        return [
            'name' => 'Name',
            'name_f' => 'Full_name',
            'name_ot' => 'Patronymic',
            'birth' => 'Birthday',
        ];
    }

}