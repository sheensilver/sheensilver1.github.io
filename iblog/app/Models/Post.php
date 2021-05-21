<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\User;
class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'content',
        'slug',
        'description',
        'image'
    ];

    // user relationship
    public function user()
    {
      return $this->belongsTo(User::class,'user_id', 'id');
    }

     // category relationship
    public function categories() {
        return $this->belongsToMany(Category::class,'categories_posts','post_id', 'category_id');

    }
}
