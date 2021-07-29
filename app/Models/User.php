<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Photo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'photo_id',
        'role_id',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo(Role::class ); // also can write => ('App\Models\Role')
    }

    public function photo(){
        return $this->belongsTo(Photo::class, 'photo_id');
    }

    public function isAdmin(){
        if ($this->role->name == "administrator" && $this->is_active == 1) {
            return true;
        }
    }

    public function posts(){
        return $this->hasMany('App\Models\Post');
    }
}
