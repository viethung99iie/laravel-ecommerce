<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCatalogue extends Model
{
    use HasFactory;

    protected $table = 'post_catalogues';

    protected $fillable = [
        'name',
        'description',
        'publish',
    ];

    // public function Posts()
    // {
    //     return $this->hasMany(Post::class, 'Post_catalogue_id', 'id');
    // }

}
