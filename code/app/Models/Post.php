<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['title', 'content', 'public', 'type'];

    /**
     * @return array
     */
    public static function getTypes()
    {
        $categories = BlogCategory::getCategories();
        $result = [];
        foreach ($categories as $key => $category) {
            $result[$key] = $category['title'] ?? '';
        }

        return $result;
    }

    /**
     * @param $type
     *
     * @return int
     */
    public static function countByCategories($type)
    {
        return static::query()->where('type', $type)->count();
    }
}
