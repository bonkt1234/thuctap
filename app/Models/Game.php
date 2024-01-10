<?php

// app/Models/Game.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $primaryKey = 'game_id';

    protected $fillable = [
        'title',
        'description',
       'release_date',
        'developer',
        'platform',
        'link',
        'image',
        'updated_at',
        'created_at',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'game_category', 'game_id', 'category_id');
    }
    public function posts()
    {
        return $this->hasMany(Post::class, 'game_id');
    }
}

