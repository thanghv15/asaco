<?php

namespace frontend\modules\product\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "products".
 *
 * @property string $id
 * @property string $code
 * @property string $title
 * @property string $title_en
 * @property string $title_fr
 * @property string $description
 * @property string $description_en
 * @property string $description_fr
 * @property string $desc
 * @property string $desc_en
 * @property string $desc_fr
 * @property string $body
 * @property string $body_en
 * @property string $body_fr
 * @property string $body2
 * @property string $body2_en
 * @property string $body2_fr
 * @property string $body3
 * @property string $body3_en
 * @property string $body3_fr
 * @property string $image_preset
 * @property string $image_url
 * @property string $image_title
 * @property string $image_alt
 * @property integer $is_new
 * @property integer $is_promotion
 * @property integer $is_seller
 * @property integer $is_hot
 * @property integer $is_stock
 * @property double $list_price
 * @property double $input_price
 * @property double $sell_price
 * @property string $warranty
 * @property double $orders
 * @property boolean $publish
 * @property boolean $show_price
 * @property string $slug
 * @property string $tags
 * @property string $seo_title
 * @property string $seo_keyword
 * @property string $seo_description
 * @property string $categories_id
 * @property string $sub_categories_id
 * @property string $create_time
 * @property string $create_by
 * @property string $update_time
 * @property string $update_by
 * @property string $hightlight
 * @property integer $provider_id
 * @property string $xuat_xu
 * @property string $bao_hanh
 * @property string $mau_sac
 * @property string $chat_lieu
 * @property string $kich_thuoc
 * @property integer $so_luong
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'description_en', 'description_fr', 'desc', 'desc_en', 'desc_fr', 'body', 'body_en', 'body_fr', 'body2', 'body2_en', 'body2_fr', 'body3', 'body3_en', 'body3_fr', 'image_url', 'image_title', 'image_alt', 'warranty', 'tags', 'seo_description', 'sub_categories_id', 'hightlight'], 'string'],
            [['is_new', 'is_promotion', 'is_seller', 'is_hot', 'is_stock', 'categories_id', 'create_by', 'update_time', 'provider_id', 'so_luong'], 'integer'],
            [['list_price', 'input_price', 'sell_price', 'orders'], 'number'],
            [['publish', 'show_price'], 'boolean'],
            [['categories_id'], 'required'],
            [['code', 'title', 'title_en', 'title_fr', 'image_preset', 'slug', 'xuat_xu', 'bao_hanh', 'mau_sac', 'chat_lieu', 'kich_thuoc'], 'string', 'max' => 255],
            [['seo_title', 'seo_keyword'], 'string', 'max' => 1000],
            [['create_time', 'update_by'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'title' => 'Title',
            'title_en' => 'Title En',
            'title_fr' => 'Title Fr',
            'description' => 'Description',
            'description_en' => 'Description En',
            'description_fr' => 'Description Fr',
            'desc' => 'Desc',
            'desc_en' => 'Desc En',
            'desc_fr' => 'Desc Fr',
            'body' => 'Body',
            'body_en' => 'Body En',
            'body_fr' => 'Body Fr',
            'body2' => 'Body2',
            'body2_en' => 'Body2 En',
            'body2_fr' => 'Body2 Fr',
            'body3' => 'Body3',
            'body3_en' => 'Body3 En',
            'body3_fr' => 'Body3 Fr',
            'image_preset' => 'Image Preset',
            'image_url' => 'Image Url',
            'image_title' => 'Image Title',
            'image_alt' => 'Image Alt',
            'is_new' => 'Is New',
            'is_promotion' => 'Is Promotion',
            'is_seller' => 'Is Seller',
            'is_hot' => 'Is Hot',
            'is_stock' => 'Is Stock',
            'list_price' => 'List Price',
            'input_price' => 'Input Price',
            'sell_price' => 'Sell Price',
            'warranty' => 'Warranty',
            'orders' => 'Orders',
            'publish' => 'Publish',
            'show_price' => 'Show Price',
            'slug' => 'Slug',
            'tags' => 'Tags',
            'seo_title' => 'Seo Title',
            'seo_keyword' => 'Seo Keyword',
            'seo_description' => 'Seo Description',
            'categories_id' => 'Categories ID',
            'sub_categories_id' => 'Sub Categories ID',
            'create_time' => 'Create Time',
            'create_by' => 'Create By',
            'update_time' => 'Update Time',
            'update_by' => 'Update By',
            'hightlight' => 'Hightlight',
            'provider_id' => 'Provider ID',
            'xuat_xu' => 'Xuat Xu',
            'bao_hanh' => 'Bao Hanh',
            'mau_sac' => 'Mau Sac',
            'chat_lieu' => 'Chat Lieu',
            'kich_thuoc' => 'Kich Thuoc',
            'so_luong' => 'So Luong',
        ];
    }

    public function get_one_product($code){
        $sql = "SELECT *
            FROM products
            WHERE code = '". $code ."'";
        $query = new Query();
        return Yii::$app->db->createCommand($sql)->queryAll();
    }
}
