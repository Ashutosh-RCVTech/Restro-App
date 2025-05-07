<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    protected $fillable = ['name', 'description', 'price', 'category_id', 'image'];

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
