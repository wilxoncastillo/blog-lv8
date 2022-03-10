<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guard = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'name',
        'slug',
        'extract',
        'body',
        'status',
        'user_id',
        'category_id',
    ];

    /* public function getRouteKeyName()
    {
        return 'slug';
    } */

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

    public function getStatusAttribute($value) {
        return $value == 1 ? 'Borrador' : 'Publicado';
    }

}
