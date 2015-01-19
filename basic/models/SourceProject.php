<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sourceproject".
 *
 * @property integer $sourceProjectId
 * @property integer $projectId
 * @property integer $sourceId
 * @property integer $ratingId
 *
 * @property Project $project
 * @property Rating $rating
 * @property Source $source
 */
class SourceProject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sourceproject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['projectId', 'sourceId', 'ratingId'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sourceProjectId' => 'Source Project ID',
            'projectId' => 'Project ID',
            'sourceId' => 'Source ID',
            'ratingId' => 'Rating ID',
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
    public function getRating()
    {
        return $this->hasOne(Rating::className(), ['ratingId' => 'ratingId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSource()
    {
        return $this->hasOne(Source::className(), ['sourceId' => 'sourceId']);
    }
}
