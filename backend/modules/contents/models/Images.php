<?php

namespace backend\modules\contents\models;
use backend\modules\product\models\Product_typeSearch;

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
class Images extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $search_text;
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
            [['type', 'create_time', 'create_by', 'update_time', 'update_by'], 'integer'],
            [['title', 'code', 'url', 'authors'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 2000],
            [['cate_id'],'required', 'message'=>'Danh mục không được trống!']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Tên ảnh',
            'code' => 'Code',
            'url' => 'Ảnh',
            'description' => 'Mô tả',
            'authors' => 'Tác giả',
            'type' => 'Type',
            'create_time' => 'Create Time',
            'create_by' => 'Create By',
            'update_time' => 'Update Time',
            'update_by' => 'Update By',
        ];
    }
    public function getCate()
    {
        return $this->hasOne(Product_typeSearch::className(), ['id' => 'cate_id']);
    }
}
