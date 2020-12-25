<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'genre',
        'num_pages',
        'publish_date',
        'img_url',
        'edition',
        'author_id'
    ];

    public $timestamps = false;

}
