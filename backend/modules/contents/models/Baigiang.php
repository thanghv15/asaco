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
class Baigiang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    
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
            // [['file'], 'required', 'message' => '{attribute} không được trống'],
            [['type', 'create_time', 'create_by', 'update_time', 'update_by','cate_id'], 'integer'],
            [['title', 'code', 'url', 'authors'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 2000],
            // [['file'],'file','extensions'=>'ppt, pps, pptx,ppsx', 'maxSize'=>1024 * 1024 * 5, 'message'=>'Tệp tại lên không quá 5M'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Tên bài giảng',
            'code' => 'Code',
            'url' => 'Link mã nhúng file',
            'description' => 'Mô tả',
            'authors' => 'Tác giả',
            'type' => 'Type',
            'create_time' => 'Create Time',
            'create_by' => 'Create By',
            'update_time' => 'Update Time',
            'update_by' => 'Update By',
            'cate_id' => 'Tên danh mục'
        ];
    }
}
