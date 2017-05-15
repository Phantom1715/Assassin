<?php

namespace app\models\form;

use app\models\Shedule;

class SheduleForm extends \yii\base\Model {
    public $id;
    public $id_item;
    public $id_class;
    public $id_teacher;
    public $day_nidely;
    public $number_urok;

    public function rules() {
        return [

            [['id_item','id_class','id_teacher','day_nidely','number_urok'],'required'],
            [['number_urok'],'integer', 'min' => 1 , 'max' => 8],
        ];
    }

    public function attributeLabels() {
        return [
            'id_item' => 'Item',
            'id_class' => 'Class',
            'id_teacher' => 'Teacher',
            'day_nidely' => 'Day',
            'number_urok' => 'Lesson',
        ];
    }

    public function run() {
        if ($this->validate()) {
            switch ($this->scenario) {
                case 'add' :
                    $sched= new Shedule();
                    $sched->id_item = $this->id_item;
                    $sched->id_class = $this->id_class;
                    $sched->id_teacher = $this->id_teacher;
                    $sched->day_nidely = $this->day_nidely;
                    $sched->number_urok = $this->number_urok;

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