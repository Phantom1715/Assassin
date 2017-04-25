<?php

namespace app\models\form;

use app\models\Clas;

class ClassForm extends \yii\base\Model {
    public $id;
    public $name;
    public $chislo_uch = 0;
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

                    if ($class->save()) {
                        return true;
                    }
                case 'edit' :
                    $class = Clas::findOne($this->id);
                    $class->name = $this->name;
                    $class->id_uchitel = $this->id_uchitel;

                    return $class->save();
            }
        }

        return false;
    }
}