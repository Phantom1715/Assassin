<?php

namespace app\models;

class Subject extends \yii\db\ActiveRecord {
    public static function tableName() {
         return 'Items';
    }
    
    public function  rules() {
        return [
             [['name'],'required'],
             [['name'],'string','max' => 40 ]
        ];
    }
    
    public function attributeLabels() {
        return [
              'name' => 'Subject'
        ];
    } 

}