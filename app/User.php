<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['registration_number', 'name', 'email', 'password',];
    protected $hidden = ['password', 'remember_token',];


    public function findForPassport($username)
    {
        return $this->where('email', $username)->orWhere('registration_number', $username)->first();
    }

    public function validateForPassportPasswordGrant($password)
    {
        return \Hash::check($password, $this->password);
    }
}
