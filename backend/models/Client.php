<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string $login
 * @property string $pass
 * @property string $firstname
 * @property string $lastname
 * @property int $sex
 * @property string $created_at
 * @property string $email
 *
 * @property ClientAdress[] $clientAdresses
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'pass', 'firstname', 'lastname', 'created_at', 'email'], 'required'],
            [['login'], 'string','min'=> 4],
            [['login'], 'unique'],
            [['pass'], 'string','min'=> 6],
            [ ['firstname'],'filter','filter'=>'strtolower'],
            [['sex'], 'integer'],
            [['created_at'], 'safe'],
            [['login', 'pass', 'firstname', 'lastname', 'email'], 'string', 'max' => 255],

            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'pass' => 'Пароль',
            'firstname' => 'Имя',
            'lastname' => 'Фамилия',
            'sex' => 'Пол',
            'created_at' => 'Дата создания',
            'email' => 'Email - адрес',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientAdresses()
    {
        return $this->hasMany(ClientAdress::className(), ['parent_id' => 'id']);
    }
}