<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property integer $id
 * @property string $ code
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $account_nh
 * @property string $note
 * @property integer $create_time
 * @property integer $create_by
 * @property integer $update_time
 * @property integer $update_by
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_time', 'create_by', 'update_time', 'update_by'], 'integer'],
            [['code', 'name', 'phone', 'email', 'account_nh'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'account_nh' => 'Account Nh',
            'note' => 'Note',
            'create_time' => 'Create Time',
            'create_by' => 'Create By',
            'update_time' => 'Update Time',
            'update_by' => 'Update By',
        ];
    }
}
