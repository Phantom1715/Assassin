<?php

namespace app\models;

class Teacher extends \yii\db\ActiveRecord {
    public static function tableName() {
        return 'Teacher';
    }

    public $id;
    public $name;
    public $name_f;
    public $name_ot;
    public $birthday;
 
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
    public function run() {
        if ($this->validate()) {
            switch ($this->scenario) {
                case 'add' :
                    $teacher = new Teacher();
                    $teacher->name = $this->name;
                    $teacher->name_f = $this->name_f;
                    $teacher->name_ot = $this->name_ot;
                    $teacher->birthday = $this->birthday;

//                    if ($this->image) {
//                        $product->uploadImage($this->image);
//                    }

                    if ($teacher->save()) {
//                        if ($this->images) {
//                            ProductImage::uploadImages($this->images, $product->id);
//                        }

                        return true;
                    }
//                case 'edit' :
//                    $product = Product::findOne($this->id);
//                    $product->name = $this->name;
//                    $product->categoryId = $this->categoryId;
//                    $product->price = $this->price;
//                    $product->description = $this->description;
//
////                    if ($this->image) {
////                        $product->uploadImage($this->image);
////                    }
////
////                    if ($this->images) {
////                        ProductImage::uploadImages($this->images, $product->id);
////                    }

                    return $teacher->save();
            }
        }

        return false;
    }
    
}