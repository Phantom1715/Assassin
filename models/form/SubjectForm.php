<?php

namespace app\models\form;

use app\models\Subject;

class SubjectForm extends \yii\base\Model {
    public $id;
    public $name;

    public function rules() {
        return [
            ['id', 'integer', 'on' => ['edit']],

            [['name'], 'required', 'on' => ['add', 'edit']],

        ];
    }

    public function attributeLabels() {
        return [
            'name' => 'Subject',
        ];
    }

    public function run() {
        if ($this->validate()) {
            switch ($this->scenario) {
                case 'add' :
                    $subject= new Subject();
                    $subject->name = $this->name;


                    if ($subject->save()) {
                        return true;
                    }
                case 'edit' :
                    $subject = Subject::findOne($this->id);

                    return $subject->save();
            }
        }

        return false;
    }
}