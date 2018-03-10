<?php

namespace App;

use App\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'first_name', 'last_name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Role(){
        return $this->belongsTo(Role::class);
    }

    public function getFullNameAttribute(){
        return $this->first_name." ".$this->last_name;
    }

    public function getThumbAttribute(){
        return "storage/images/profiles/thumb/".($this->profile_pic ?: "default.png");
    }

    public function getProfileAvatarAttribute(){
        return "storage/images/profiles/".($this->profile_pic ?: "default.png");
    }

    public function getDevAttribute(){
        return $this->Role->level === 99;
    }
}
