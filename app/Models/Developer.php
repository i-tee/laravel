<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Attachment\Attachable;

class Developer extends Model
{
    use HasFactory;
    use AsSource, Attachable;

    protected $fillable = [
        'nikname',
        'fio',
        'city',
        'content',
        'profession',
        'telegram_url',
        'github_url',
        'email',
        'experiencedate',
        'birthdate',
        'education',
        'avatar_url'
    ];
}
