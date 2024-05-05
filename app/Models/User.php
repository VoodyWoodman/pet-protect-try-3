<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\CanResetPassword;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Отношение "один ко многим" с моделью Site
    public function sites()
    {
        return $this->hasMany(Site::class);
    }

    // Проверка на админа
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    // Проверка на модератора

    public function isModerator()
    {
        return $this->role === 'moderator';
    }

    public function name()
    {
        return $this->name;
    }

    // Защищенные поля
    protected $guarded = [];

    // Мутатор для аватара
    public function setAvatarAttribute($value)
    {
        $this->attributes['avatar'] = $value;
    }




}
