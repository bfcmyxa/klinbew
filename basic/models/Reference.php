<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reference".
 *
 * @property integer $referenceId
 * @property string $name
 * @property string $file
 * @property integer $version
 *
 * @property Referenceproject[] $referenceprojects
 */
class Reference extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reference';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['version'], 'integer'],
            [['name', 'file'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'referenceId' => 'Reference ID',
            'name' => 'Name',
            'file' => 'File',
            'version' => 'Version',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReferenceprojects()
    {
        return $this->hasMany(Referenceproject::className(), ['referenceId' => 'referenceId']);
    }
}
