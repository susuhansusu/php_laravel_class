<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function categories()
    {
        $categories = Category::select(['categories.*'])
        ->join('category_post', 'category_post.category_id', 'categories.id')
        ->where('category_post.post_id', $this->id)
        ->get();

        return $categories;
    }

}
