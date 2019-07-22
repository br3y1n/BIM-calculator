<?php
namespace frontend\models;

use Yii;
use yii\helpers\VarDumper;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $email;
    public $password;
    public $confirmPassword;
    public $name;
    public $lastName;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            ['name', 'string', 'max' => 255],
            ['name', 'match', 'pattern' => '/^[a-zA-Z ñÑ]*$/', 'message' => ' {attribute} only supports alphabetic values ​​without accentuation'],

            ['lastName', 'required'],
            ['lastName', 'string', 'max' => 255],
            ['lastName', 'match', 'pattern' => '/^[a-zA-Z ñÑ]*$/', 'message' => ' {attribute} only supports alphabetic values ​​without accentuation'],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['confirmPassword', 'required'],
            ['confirmPassword', 'compare', 'compareAttribute'=>'password', 'message'=> Yii::t('app', "Passwords don't match")],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'lastName' => Yii::t('app', 'Last Name'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
            'confirmPassword' => Yii::t('app', 'Confirm Password'),
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->email = $this->email;
        $user->name = $this->name;
        $user->last_name = $this->lastName;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        return $user->save() && $this->sendEmail($user);

    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::t('app', 'BMI Calculator - Register')])
            ->setTo($this->email)
            ->setSubject(Yii::t('app', 'Account registration at ') . Yii::t('app', 'BMI Calculator'))
            ->send();
    }
}
