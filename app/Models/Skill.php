<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Skill extends Model
{
    use HasFactory;
    use AsSource;

    protected $table = 'skills';

    protected $fillable = [
        'name',
        'percent',
        'category_id',
        'developer_id'
    ];
}
