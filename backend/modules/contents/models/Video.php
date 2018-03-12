<?php

namespace backend\modules\contents\models;

use Yii;

/**
 * This is the model class for table "contents".
 *
 * @property integer $id
 * @property string $title
 * @property string $code
 * @property string $url
 * @property string $description
 * @property string $authors
 * @property integer $type
 * @property integer $create_time
 * @property integer $create_by
 * @property integer $update_time
 * @property integer $update_by
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contents';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title','cate_id','url'], 'required', 'message' => '{attribute} không được trống'],
            [['type', 'create_time', 'create_by', 'update_time', 'update_by'], 'integer'],
            [['title', 'code', 'url', 'authors'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 2000],
            [['title','url','description','authors'], 'trim']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Tên video học',
            'code' => 'Code',
            'url' => 'Link vieo youtube',
            'description' => 'Mô tả',
            'authors' => 'Authors',
            'type' => 'Type',
            'create_time' => 'Create Time',
            'create_by' => 'Create By',
            'update_time' => 'Update Time',
            'update_by' => 'Update By',
        ];
    }
}
