<?php

namespace app\models;

class Teacher extends \yii\db\ActiveRecord {
    public static function tableName() {
        return 'Teacher';
    }
 
    public function  rules() {
        return [
            [['name','name_f','name_ot'],'required'],
            [['name','name_f','name_ot'],'string','max' => 100],
            [['birthday','employment'],'safe']
        ];
    }

    public function attributeLabels() {
        return [
            'name' => 'Name',
            'name_f' => 'Full_name',
            'name_ot' => 'Patronymic',
            'birthday' => 'Birthday',
            'employment' => 'Employment'
        ];
    }
      
}