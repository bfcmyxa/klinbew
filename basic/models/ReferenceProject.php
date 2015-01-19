<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "referenceproject".
 *
 * @property integer $referenceProjectId
 * @property integer $projectId
 * @property integer $referenceId
 *
 * @property Project $project
 * @property Reference $reference
 */
class ReferenceProject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'referenceproject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['projectId', 'referenceId'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'referenceProjectId' => 'Reference Project ID',
            'projectId' => 'Project ID',
            'referenceId' => 'Reference ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['projectid' => 'projectId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReference()
    {
        return $this->hasOne(Reference::className(), ['referenceId' => 'referenceId']);
    }
}
