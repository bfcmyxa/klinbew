<?php

namespace app\models;

use yii\base\Model;

class SourceImport extends Model
{
    public $text;

    public function rules()
    {
        return [
            [['text'], 'required'],
        ];
    }
}