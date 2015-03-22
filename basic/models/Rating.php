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
            [['ratedBy', 'use', 'risk', 'evidenceValue', 'relevanceValue', 'signValue'], 'integer'],
            [['ratingDate'], 'safe'],
            [['ratingSummary', 'evidenceText', 'relevanceText', 'signText'], 'string', 'max' => 1000]
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
            'evidenceValue' => 'Evidenz Wert',
            'relevanceValue' => 'Relevanz Wert',
            'signValue' => 'Signifikanz Wert',
            'use' => 'Geht es bei dieser Quelle um Nutzen?',
            'risk' => 'Geht es bei dieser Quelle um Risiken?',
            'evidenceText' => 'Evidenz Begründung',
            'relevanceText' => 'Relevanz Begründung',
            'signText' => 'Signifikanz Begründung',
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
