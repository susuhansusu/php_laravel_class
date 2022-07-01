<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];


public function Category_post()
    {
        return $this->hasMany(Category_post::class, 'post_id', 'id');
    }
}