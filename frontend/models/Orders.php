<?php

namespace frontend\models;

use Yii;
use yii\db\Query;
use frontend\models\Customers;
/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property string $code
 * @property string $product_id
 * @property string $customer_id
 * @property integer $quantity
 * @property integer $status
 * @property integer $create_time
 * @property integer $create_by
 * @property string $note
 * @property integer $update_time
 * @property integer $update_by
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quantity', 'status', 'create_time', 'create_by', 'update_time', 'update_by'], 'integer'],
            [['code', 'product_id', 'customer_id'], 'string', 'max' => 255],
            [['note'], 'string', 'max' => 2000],
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
            'product_id' => 'Product ID',
            'customer_id' => 'Customer ID',
            'quantity' => 'Quantity',
            'status' => 'Status',
            'create_time' => 'Create Time',
            'create_by' => 'Create By',
            'note' => 'Note',
            'update_time' => 'Update Time',
            'update_by' => 'Update By',
        ];
    }
    public function save_order_call($array){
        // check phone customer
        $id_user = Yii::$app->user->id;
        $create_time = time();
        if ($array['phone']) {
            $phone = $array['phone'];
            $sql = "SELECT id
                    FROM customers ctm
                    WHERE ctm.phone = '".$phone."'";
            $query = new Query();
            $customer = Yii::$app->db->createCommand($sql)->queryOne();
            if ($customer) {
                $id_customer = $customer['id'];
            }else{
                $obj = new Customers();
                $obj->code = $this->generateRandomString();
                $obj->name = $array['fullname'];
                $obj->phone = $array['phone'];
                $obj->email = $array['email'];
                $obj->create_time = (int)$create_time;
                $obj->create_by = (int)$id_user;
                $obj->update_time = (int)$create_time;
                $obj->update_by = (int)$id_user;
                $obj->save(false);

                $sql = "SELECT id
                    FROM customers ctm
                    WHERE ctm.phone = '".$phone."'";
                $query = new Query();
                $customer = Yii::$app->db->createCommand($sql)->queryOne();
                $id_customer = $customer['id'];
              
            }
            $sql = "SELECT count(*) count
                FROM orders";
            $count = Yii::$app->db->createCommand($sql)->queryOne();
            $num = (int)$count['count'] + 1;

            $obj = new Orders();
            $obj->code = 'DH000'.$num;
            $obj->customer_id = $id_customer;
            $obj->status = 2;
            $obj->note = $array['note'];
            if (isset($array['product_id'])) {
                $obj->product_id = $array['product_id'];
            }
            $obj->create_time = (int)$create_time;
            $obj->create_by = (int)$id_user;
            $obj->update_time = (int)$create_time;
            $obj->update_by = (int)$id_user;
            $obj->save(false);

            return true;
            # code...
        }else{
            return true;
        }
    }
    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
