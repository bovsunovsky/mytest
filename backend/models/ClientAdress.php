<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client_adress".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $postcode
 * @property string $country
 * @property string $sity
 * @property string $street
 * @property int $building
 * @property int $office
 *
 * @property Client $parent
 */
class ClientAdress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_adress';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'postcode', 'country', 'sity', 'street'], 'required'],
            [['parent_id', 'building', 'office'], 'integer'],
            [['postcode'], 'string', 'max' => 32],
            [['country'], 'string', 'max' => 4],
            [['sity', 'street'], 'string', 'max' => 128],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'postcode' => 'Postcode',
            'country' => 'Country',
            'sity' => 'Sity',
            'street' => 'Street',
            'building' => 'Building',
            'office' => 'Office',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Client::className(), ['id' => 'parent_id']);
    }
}