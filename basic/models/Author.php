<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "author".
 *
 * @property integer $authorId
 * @property interger $sourceAuthId
 * @property string $name
 * @property string $fname
 *
 * @property Source[] $sources
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'fname'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'authorId' => 'Author ID',
            'name' => 'Name',
            'fname' => 'Familienname',
            'sourceAuthId' => 'Source Id'
        ];
    }

}
