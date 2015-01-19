<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "source".
 *
 * @property integer $sourceId
 * @property string $type
 * @property integer $authorId
 * @property string $title
 * @property integer $year
 * @property string $place
 * @property string $publisher
 * @property string $keywords
 * @property string $text
 * @property integer $status
 * @property integer $sourceRatingId
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
            [['authorId', 'year', 'status', 'sourceRatingId'], 'integer'],
            [['type', 'title', 'place', 'publisher', 'keywords', 'text', 'summary'], 'string', 'max' => 45]
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
            'authorId' => 'Author ID',
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
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['authorId' => 'authorId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSourceprojects()
    {
        return $this->hasMany(Sourceproject::className(), ['sourceId' => 'sourceId']);
    }
}
