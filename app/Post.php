<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use App\Category;

class Post extends Model
{

    use SoftDeletes;

    protected $fillable = 
    [
        'title', 'description', 'content', 'image', 'published_at', 'category_id'
    ];

    public function deleteImage(){

        Storage::delete($this->image);
    }

    public function category(){

        return $this->belongsTo(Category::class);
    }
}
