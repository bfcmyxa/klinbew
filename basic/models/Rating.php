<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rating".
 *
 * @property integer $ratingId
 * @property integer $ratedBy
 * @property string $ratingDate
 * @property integer $evidenceValue
 * @property integer $relevanceValue
 * @property integer $signValue
 * @property integer $use
 * @property integer $risk
 * @property string $evidenceText
 * @property string $relevanceText
 * @property string $signText
 * @property string $ratingSummary
 *
 * @property Sourceproject[] $sourceprojects
 */
class Rating extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rating';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ratedBy', 'evidenceValue', 'relevanceValue', 'signValue', 'use', 'risk'], 'integer'],
            [['ratingDate'], 'safe'],
            [['evidenceText', 'relevanceText', 'signText'], 'string', 'max' => 255],
            [['ratingSummary'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ratingId' => 'Rating ID',
            'ratedBy' => 'Rated By',
            'ratingDate' => 'Rating Date',
            'evidenceValue' => 'Evidence Value',
            'relevanceValue' => 'Relevance Value',
            'signValue' => 'Sign Value',
            'use' => 'Use',
            'risk' => 'Risk',
            'evidenceText' => 'Evidence Text',
            'relevanceText' => 'Relevance Text',
            'signText' => 'Sign Text',
            'ratingSummary' => 'Zusammenfassung',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSourceprojects()
    {
        return $this->hasMany(Sourceproject::className(), ['ratingId' => 'ratingId']);
    }
}
