<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'excerpt', 'body']; // Указываем поля, доступные для массового заполнения

    protected $attributes = [
        'content' => '', // Значение по умолчанию для поля 'content'
    ];

}
