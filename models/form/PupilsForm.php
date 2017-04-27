<?php

namespace app\models\form;

use app\models\Pupils;

class PupilsForm extends \yii\base\Model {
    public $id;
    public $name;
    public $name_f;
    public $name_ot;
    public $birth;
    public $id_class;
    
    public function rules() {
        return [
            ['id', 'integer', 'on' => ['edit']],

            [['name', 'name_f', 'name_ot','birth','id_class'], 'required', 'on' => ['add', 'edit']],

            ['birth', 'date', 'format' => 'php:Y-m-d', 'on' => ['add', 'edit']],
        ];
    }

    public function attributeLabels() {
        return [
            'name_f' => 'FullName',
            'name' => 'Name',
            'name_ot' => 'Patronymic',
            'birth' => 'Birthday',
            'id_class' => 'ID_Klass'
        ];
    }

    public function run() {
        if ($this->validate()) {
            switch ($this->scenario) {
                case 'add' :
                    $pupils= new Pupils();
                    $pupils->name = $this->name;
                    $pupils->name_ot = $this->name_ot;
                    $pupils->name_f = $this->name_f;
                    $pupils->birth = $this->birth;
                    $pupils->id_class = $this->id_class;
                    
                    if ($pupils->save()) {
                        Clas::findOne($id_class);
                        return true;
                    }
                case 'edit' :
                    $pupils = Pupils::findOne($this->id);
                    $pupils->name = $this->name;
                    $pupils->name_ot = $this->name_ot;
                    $pupils->name_f = $this->name_f;
                    $pupils->birth = $this->birth;
                    $pupils->id_class = $this->id_class;

                    return $pupils->save();
            }
        }

        return false;
    }
}