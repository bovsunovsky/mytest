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
            [['postcode'], 'string', 'length' => [4, 32], 'tooShort'=>'Слишком мало, минимум 4', 'tooLong'=>'Слишком много, максимум 32 '],
            [['postcode'], 'match', 'pattern' => '/^[0-9]*$/i', 'message'=>'Только цифры'],
            [['country'], 'filter', 'filter' => 'trim'],
            [['country'], 'string', 'length' => [2,2], 'tooShort'=>'Слишком мало,  2-английские заглавные буквы', 'tooLong'=>'Слишком много,  2-английские заглавные буквы'],
            [['country'], 'match', 'pattern' => '/^[A-Z]\w*$/u', 'message'=>'Только английские заглавные буквы, 2-x символьная кодировка'],
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
            'postcode' => 'Почтовый индекс',
            'country' => 'Страна',
            'sity' => 'Город',
            'street' => 'Улица',
            'building' => 'Дом',
            'office' => 'Квартира',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Client::className(), ['id' => 'parent_id']);
    }

   public $template = '{view} {update} {delete}';
    public $controller = 'ClientAdressController';

}