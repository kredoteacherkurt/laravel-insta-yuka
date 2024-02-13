<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;
    protected $table = 'category_post';
    protected $fillable = ['post_id', 'category_id'];
    public $timestamps = false;
    //associative array
    //  [
        // ['post_id' => 1][category_id=>1,]
    //  'post_id' => 1][category_id=>2,]
    //  'post_id' => 1][category_id=>3,]
    // ]


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
