<?php

namespace backend\modules\contents\models;

use Yii;
use backend\modules\product\models\Product_type;

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
class Game extends \yii\db\ActiveRecord
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
            [['type', 'create_time', 'create_by', 'update_time', 'update_by'], 'integer'],
             [['title', 'cate_id'], 'required','message' => '{attribute} không được trống'],
            [['title', 'code', 'url', 'authors'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 2000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Tên game',
            'code' => 'Mã',
            'url' => 'Link game',
            'description' => 'Mô tả',
            'authors' => 'Authors',
            'type' => 'Loại',
            'create_time' => 'Thời gian tạo',
            'create_by' => 'Create By',
            'update_time' => 'Update Time',
            'update_by' => 'Update By',
            'cate_id' => 'Danh mục',
        ];
    }
    public function getCategory()
    {
        return $this->hasOne(Product_type::className(), ['id' => 'cate_id']);
    }
}
