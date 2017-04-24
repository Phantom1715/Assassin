<?php

namespace app\models\form;

use app\models\Clas;

class ClassForm extends \yii\base\Model {
    public $id;
    public $name;
    public $chislo_uch;
    public $id_uchitel;

    public function rules() {
        return [
            ['id', 'integer', 'on' => ['edit']],

            [['name','id_uchitel'], 'required', 'on' => ['add', 'edit']],
        ];
    }

    public function attributeLabels() {
        return [
            'name' => 'Name',
            'chislo_uch' => 'Count',
            'id_uchitel' => 'Teacher',
        ];
    }

    public function run() {
        if ($this->validate()) {
            switch ($this->scenario) {
                case 'add' :
                    $class= new Clas();
                    $class->name = $this->name;
                    $class->id_uchitel = $this->id_uchitel;

//                    if ($this->image) {
//                        $product->uploadImage($this->image);
//                    }

                    if ($class->save()) {
//                        if ($this->images) {
//                            ProductImage::uploadImages($this->images, $product->id);
//                        }

                        return true;
                    }
                case 'edit' :
                    $class = Clas::findOne($this->id);
                    $class->name = $this->name;
                    $class->id_uchitel = $this->id_uchitel;

//                    if ($this->image) {
//                        $teacher->uploadImage($this->image);
//                    }
//
//                    if ($this->images) {
//                        ProductImage::uploadImages($this->images, $teacher->id);
//                    }

                    return $class->save();
            }
        }

        return false;
    }
}