<?php

namespace frontend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "body_mass_index".
 *
 * @property int $id
 * @property string $registration_date
 * @property string $weight
 * @property string $height
 * @property string $BMI
 * @property string $classification
 * @property int $id_user
 *
 * @property User $user
 */
class BodyMassIndex extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'body_mass_index';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['registration_date', 'weight', 'height', 'BMI', 'classification', 'id_user'], 'required'],
            [['registration_date'], 'safe'],
            [['weight', 'height', 'BMI'], 'number'],
            [['id_user'], 'integer'],
            [['classification'], 'string', 'max' => 255],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'registration_date' => Yii::t('app', 'Registration Date'),
            'weight' => Yii::t('app', 'Weight'),
            'height' => Yii::t('app', 'Height'),
            'BMI' => Yii::t('app', 'BMI'),
            'classification' => Yii::t('app', 'Classification'),
            'id_user' => Yii::t('app', 'Id User'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
