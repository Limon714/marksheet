<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password'
    ];

    public function recipes() {
        return $this->hasMany( Recipe::class );
    }

    public function reviews() {
        return $this->hasMany( Review::class );
    }

    public function likedRecipes() {
        return $this->belongsToMany(Recipe::class,'likes');
    }

}
