<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Category_post;

class Post extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'title',
    //     'body',
    // ];

    protected $guarded = [];

    public function isOwnPost()
    {
        return Auth::check() && $this->user_id == Auth::id();
    }

    // public function user()
    // {
    //     //return $this->belongsTo(User::class, 'user_id', 'id');
    //     return $this->belongsTo(User::class);
    // }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function categories()
    {
        $categories = Category::select(['categories.*'])
        ->join('category_posts', 'category_posts.category_id', 'categories.id')
        ->where('category_posts.post_id', $this->id)
        ->get();

        return $categories;
    }

}
