<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // relacion 1:n inversas
    public function user() {
        return $this->belongsTo(User::class);
    }

    // relacion 1:n inversas
    public function category() {
        return $this->belongsTo(Category::class);
    }

    // relacion n:n
    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    // relacion 1:1 polimorfica
    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }

}
