<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $full_name;
    public $citizenship;
    public $phone_number;
    public $passport_id;
    public $passport_validity;
    public $passport_authority;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['full_name', 'required'],
            ['full_name', 'string', 'min' => 10, 'max' => 255],

            ['citizenship', 'required'],
            ['citizenship', 'string', 'min' => 10, 'max' => 255],

            ['phone_number','trim'],
            ['phone_number','required'],
            ['phone_number', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This phone number has already been registered.'],
            ['phone_number', 'string', 'min' => 8, 'max' => 55],

            ['passport_id', 'required'],
            ['passport_id', 'string', 'min' => 10, 'max' => 50],

            ['passport_validity', 'required'],
            ['passport_validity', 'string'],

            ['passport_authority', 'required'],
            ['passport_authority', 'string', 'min' => 2, 'max' => 50],



        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->full_name = $this->full_name;
        $user->phone_number = $this->phone_number;
        $user->citizenship = $this->citizenship;
        $user->passport_id = $this->passport_id;
        $user->passport_validity = $this->passport_validity;
        $user->passport_authority = $this->passport_authority;

        return $user->save() ? $user : null;
    }
}
