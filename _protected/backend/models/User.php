<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property integer $status
 * @property string $auth_key
 * @property string $password_reset_token
 * @property string $account_activation_token
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Article[] $articles
 * @property Cart[] $carts
 * @property Istab[] $istabs
 * @property Istab[] $istabs0
 * @property Order[] $orders
 * @property Order[] $orders0
 * @property Order[] $orders1
 * @property Order[] $orders2
 * @property Stmas[] $stmas
 * @property Stpri[] $stpris
 * @property Stpri[] $stpris0
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password_hash', 'status', 'auth_key', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'email', 'password_hash', 'password_reset_token', 'account_activation_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password_hash' => 'Password Hash',
            'status' => 'Status',
            'auth_key' => 'Auth Key',
            'password_reset_token' => 'Password Reset Token',
            'account_activation_token' => 'Account Activation Token',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['creby' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIstabs()
    {
        return $this->hasMany(Istab::className(), ['chgby' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIstabs0()
    {
        return $this->hasMany(Istab::className(), ['creby' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['chgby' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders0()
    {
        return $this->hasMany(Order::className(), ['creby' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders1()
    {
        return $this->hasMany(Order::className(), ['ivrecby' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders2()
    {
        return $this->hasMany(Order::className(), ['sorecby' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStmas()
    {
        return $this->hasMany(Stmas::className(), ['creby' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStpris()
    {
        return $this->hasMany(Stpri::className(), ['chgby' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStpris0()
    {
        return $this->hasMany(Stpri::className(), ['creby' => 'id']);
    }

    /**
     * @inheritdoc
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
}
