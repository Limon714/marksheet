<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'ingredients',
        'steps',
        'category_id',
        'cooking_time',
        'calories',
        'fat',
        'protein',
        'carbs',
    ];

    public function user() {
        return $this->belongsTo( User::class );
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews() {
        return $this->hasMany( Review::class );
    }

    public function likes(){
        return $this->belongsToMany(User::class, 'likes');
    }
}
