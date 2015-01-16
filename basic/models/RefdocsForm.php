<?php

namespace app\models;

use yii\base\Model;

class RefdocsForm extends Model
{
    public $name;
    public $pfad;
    public $version;

    public function rules()
    {
        return [
            [['name', 'pfad', 'version'], 'required'],
        ];
    }
}