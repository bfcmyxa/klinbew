<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "source".
 *
 * @property integer $sourceId
 * @property string $type
 * @property string $title
 * @property integer $year
 * @property string $place
 * @property string $publisher
 * @property string $keywords
 * @property string $text
 * @property integer $status
 * @property string $summary
 *
 * @property Author $author
 * @property Sourceproject[] $sourceprojects
 */
class Source extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'source';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['year', 'status'], 'integer'],
            [['year'], 'safe'],
            [['place'], 'string', 'max' => 45],
            [['type', 'title', 'publisher'], 'string', 'max' => 255],
            [['keywords', 'text', 'summary'], 'string', 'max' => 10000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sourceId' => 'Source ID',
            'type' => 'Type',
            'title' => 'Title',
            'year' => 'Year',
            'place' => 'Place',
            'publisher' => 'Publisher',
            'keywords' => 'Keywords',
            'text' => 'Text',
            'status' => 'Status',
            'sourceRatingId' => 'Source Rating ID',
            'summary' => 'Summary',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery

    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['authorId' => 'authorId']);
    }
     */
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSourceprojects()
    {
        return $this->hasMany(Sourceproject::className(), ['sourceId' => 'sourceId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRatings() {
        return $this->hasMany(Rating::className(), ['ratingId' => 'ratingId'])
            ->viaTable(SourceProject::tableName(), ['sourceId' => 'sourceId']);
    }

    public function getAuthors() {
        return $this->hasMany(Author::className(), ['sourceId' => 'sourceAuthId']);
    }

}
