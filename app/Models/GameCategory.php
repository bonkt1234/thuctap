<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameCategory extends Model
{
    protected $table = 'game_category';

    protected $fillable = [
        'game_id', 'category_id',
    ];
}