<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "istab".
 *
 * @property integer $id
 * @property string $tabtyp
 * @property string $typcod
 * @property string $abbreviate_th
 * @property string $abbreviate_en
 * @property string $typdes_th
 * @property string $typdes_en
 * @property string $rate
 * @property integer $creby
 * @property string $credate
 * @property integer $chgby
 * @property string $chgdate
 *
 * @property Dlvprofile[] $dlvprofiles
 * @property Dlvprofile[] $dlvprofiles0
 * @property User $chgby0
 * @property User $creby0
 * @property Order[] $orders
 * @property Order[] $orders0
 * @property Stmas[] $stmas
 */
class Istab extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'istab';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tabtyp', 'typcod', 'creby', 'credate'], 'required'],
            [['rate'], 'number'],
            [['creby', 'chgby'], 'integer'],
            [['credate', 'chgdate'], 'safe'],
            [['tabtyp', 'typcod'], 'string', 'max' => 8],
            [['abbreviate_th', 'abbreviate_en', 'typdes_en'], 'string', 'max' => 20],
            [['typdes_th'], 'string', 'max' => 50],
            [['tabtyp', 'typcod'], 'unique', 'targetAttribute' => ['tabtyp', 'typcod'], 'message' => 'The combination of Tabtyp and Typcod has already been taken.'],
            [['chgby'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['chgby' => 'id']],
            [['creby'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['creby' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tabtyp' => 'Tabtyp',
            'typcod' => 'Typcod',
            'abbreviate_th' => 'Abbreviate Th',
            'abbreviate_en' => 'Abbreviate En',
            'typdes_th' => 'Typdes Th',
            'typdes_en' => 'Typdes En',
            'rate' => 'Rate',
            'creby' => 'Creby',
            'credate' => 'Credate',
            'chgby' => 'Chgby',
            'chgdate' => 'Chgdate',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDlvprofiles()
    {
        return $this->hasMany(Dlvprofile::className(), ['dlvid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDlvprofiles0()
    {
        return $this->hasMany(Dlvprofile::className(), ['profileid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChgby0()
    {
        return $this->hasOne(User::className(), ['id' => 'chgby']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreby0()
    {
        return $this->hasOne(User::className(), ['id' => 'creby']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['dlvby' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders0()
    {
        return $this->hasMany(Order::className(), ['tqucod' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStmas()
    {
        return $this->hasMany(Stmas::className(), ['stkgrp' => 'id']);
    }

    /**
     * @inheritdoc
     * @return IstabQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IstabQuery(get_called_class());
    }
}
