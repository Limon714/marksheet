<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['sub_category_id', 'name', 'image'];

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
