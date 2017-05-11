<?php

namespace app\models\form;

use app\models\Pupils;
use app\models\Clas;
use yii\base\Exception;

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
                    $transaction = \Yii::$app->db->beginTransaction();

                    try {
                        $pupils= new Pupils();
                        $pupils->name = $this->name;
                        $pupils->name_ot = $this->name_ot;
                        $pupils->name_f = $this->name_f;
                        $pupils->birth = $this->birth;
                        $pupils->id_class = $this->id_class;

                        if (!$pupils->save()) {
                            throw new Exception();
                        }

                        $class = Clas::findOne($this->id_class);
                        $class->chislo_uch += 1;
                        if (!$class->save()) {
                            throw new Exception();
                        }

                        $transaction->commit();
                        return true;
                    } catch(Exception $e) {
                        $transaction->rollBack();
                    }

                case 'edit' :
                    $transaction = \Yii::$app->db->beginTransaction();

                    try {
                        $pupils = Pupils::findOne($this->id);
                        
                        if($pupils->id_class != $this->id_class )
                        {
                            $class = Clas::findOne($pupils->id_class);

                            $class->chislo_uch -= 1;
                            if (!$class->save()) {
                                throw new Exception();
                            }

                            //Удаление учеников в предыдущем и добавление в текущем.
                            $class = Clas::findOne($this->id_class);
                            $class->chislo_uch += 1;
                            if (!$class->save()) {
                                throw new Exception();
                            }
                        }

                        $pupils->name = $this->name;
                        $pupils->name_ot = $this->name_ot;
                        $pupils->name_f = $this->name_f;
                        $pupils->birth = $this->birth;
                        $pupils->id_class = $this->id_class;

                        if (!$pupils->save()) {
                            throw new Exception();
                        }

                        $transaction->commit();
                        return true;
                    } catch (Exception $e) {
                        $transaction->rollBack();
                    }
            }
        }

        return false;
    }
}