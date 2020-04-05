<?php declare(strict_types=1);

namespace App\Models;

class Category extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'service_categories';

    protected $fillable = ['name'];
}
