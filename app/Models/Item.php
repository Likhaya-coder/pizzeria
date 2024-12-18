<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'image'];


   /*If we are using a json format in Laravel 8 database, we have to make
   a conversion from a json format to a string using the following code.
   Make sure that the 'attribute' value are the column names from the database table.*/
   public function setFoodTypeAttribute($value)
    {
        $this->attributes['food_type'] = json_encode($value, true);
    }
    public function getFoodTypeAttribute($value)
    {
        return $this->attributes['food_type'] = json_decode($value, true);
    }
}
