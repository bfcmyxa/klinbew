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
            [['creationDate', 'modifyDate', 'productDescription'], 'safe'],
            [['title', 'alias', 'status', 'fileName', 'productName'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'projectid' => 'Projectid',
            'title' => 'Name des Projekts',
            'alias' => 'Link auf das Projekt',
            'status' => 'Status',
            'createdBy' => 'Author',
            'creationDate' => 'Creation Date',
            'modifyDate' => 'Modify Date',
            'fileName' => 'Dateiname',
            'productName' => 'Produktname',
            'dokumentVersion' => 'Dokument Version',
            'productVersion' => 'Produkt Version',
            'referenceProjectId' => 'Reference Project ID',
            'productDescription' => 'Product Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy0()
    {
        return $this->hasOne(User::className(), ['id' => 'createdBy']);
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReferences() {
        return $this->hasMany(Reference::className(), ['referenceId' => 'referenceId'])
                        ->viaTable(ReferenceProject::tableName(), ['projectId' => 'projectid']);
    }
}
