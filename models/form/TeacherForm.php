<?php

namespace app\models\form;

use app\models\Teacher;

class TeacherForm extends \yii\base\Model {
    public $id;
    public $name;
    public $name_f;
    public $name_ot;
    public $birthday;
    public $employment;
//    public $image;
//    public $images;

    public function rules() {
        return [
            ['id', 'integer', 'on' => ['edit']],

            [['name', 'name_f', 'name_ot','birthday'], 'required', 'on' => ['add', 'edit']],

            ['birthday', 'date', 'format' => 'php:Y-m-d', 'on' => ['add', 'edit']],
            ['employment', 'date', 'format' => 'php:Y-m-d', 'on' => ['add', 'edit']]
//            ['image', 'image', 'mimeTypes' => 'image/png, image/jpg, image/jpeg', 'maxSize' => 10050000, 'maxFiles' => 1],
//            ['images', 'image', 'mimeTypes' => 'image/png, image/jpg, image/jpeg', 'maxSize' => 100500000, 'maxFiles' => 10]
        ];
    }

    public function attributeLabels() {
        return [
            'name_f' => 'FullName',
            'name' => 'Name',
            'name_ot' => 'Patronymic',
            'birthday' => 'Birthday',
            'employment' => 'Employment'
        ];
    }

    public function run() {
        if ($this->validate()) {
            switch ($this->scenario) {
                case 'add' :
                    $teacher= new Teacher();
                    $teacher->name = $this->name;
                    $teacher->name_ot = $this->name_ot;
                    $teacher->name_f = $this->name_f;
                    $teacher->birthday = $this->birthday;
                    $teacher->employment = $this->employment;

//                    if ($this->image) {
//                        $product->uploadImage($this->image);
//                    }

                    if ($teacher->save()) {
//                        if ($this->images) {
//                            ProductImage::uploadImages($this->images, $product->id);
//                        }

                        return true;
                    }
                case 'edit' :
                    $teacher = Teacher::findOne($this->id);
                    $teacher->name = $this->name;
                    $teacher->name_ot = $this->name_ot;
                    $teacher->name_f = $this->name_f;
                    $teacher->birthday = $this->birthday;
                    $teacher->employment = $this->employment;

//                    if ($this->image) {
//                        $teacher->uploadImage($this->image);
//                    }
//
//                    if ($this->images) {
//                        ProductImage::uploadImages($this->images, $teacher->id);
//                    }

                    return $teacher->save();
            }
        }

        return false;
    }
}