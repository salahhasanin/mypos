<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;


    protected $fillable = [
        'first_name','last_name', 'email', 'password', 'image'
    ];

    protected $appends = ['image_path'];


    protected $hidden = [
        'password', 'remember_token',
    ];
//return FirstName as uppercase
    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);

    }//end of get first name

    public function getLastNameAttribute($value)
    {
        return ucfirst($value);

    }//end of get last name
//if open inspect will see image path
    public function getImagePathAttribute()
    {
        //asset navigate to public folder
        return asset('uploads/user_images/' . $this->image);

    }//end of get image path
}
