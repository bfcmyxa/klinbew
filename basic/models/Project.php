<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property integer $projectid
 * @property string $title
 * @property string $alias
 * @property string $status
 * @property integer $createdBy
 * @property string $creationDate
 * @property string $modifyDate
 * @property string $fileName
 * @property string $productName
 * @property integer $dokumentVersion
 * @property integer $productVersion
 * @property integer $referenceProjectId
 * @property string $productDescription
 *
 * @property User $createdBy0
 * @property Referenceproject[] $referenceprojects
 * @property Sourceproject[] $sourceprojects
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['createdBy', 'dokumentVersion', 'productVersion', 'referenceProjectId'], 'integer'],
            [['creationDate', 'modifyDate'], 'safe'],
            [['title', 'alias', 'status', 'fileName', 'productName', 'productDescription'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'projectid' => 'Projectid',
            'title' => 'Title',
            'alias' => 'Alias',
            'status' => 'Status',
            'createdBy' => 'Created By',
            'creationDate' => 'Creation Date',
            'modifyDate' => 'Modify Date',
            'fileName' => 'File Name',
            'productName' => 'Product Name',
            'dokumentVersion' => 'Dokument Version',
            'productVersion' => 'Product Version',
            'referenceProjectId' => 'Reference Project ID',
            'productDescription' => 'Product Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy0()
    {
        return $this->hasOne(User::className(), ['userid' => 'createdBy']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReferenceprojects()
    {
        return $this->hasMany(Referenceproject::className(), ['projectId' => 'projectid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSourceprojects()
    {
        return $this->hasMany(Sourceproject::className(), ['projectId' => 'projectid']);
    }
}
