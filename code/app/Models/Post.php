<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['title', 'content', 'public', 'type'];

    public static function getTypes()
    {
        return [
            'updates' => 'Council updates',
            'supports' => 'Business & Community supports',
        ];
    }
}
