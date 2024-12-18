<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";

    protected $fillable = ['full_names', 'delivery', 'food_type','dish_name', 'street', 'town', 'city', 'code'];


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

    public function setDishNameAttribute($value)
    {
        $this->attributes['dish_name'] = json_encode($value, true);
    }
    public function getDishNameAttribute($value)
    {
        return $this->attributes['dish_name'] = json_decode($value, true);
    }

    public function setExtraToppingsAttribute($value)
    {
        $this->attributes['extra_toppings'] = json_encode($value, true);
    }
    public function getExtraToppingsAttribute($value)
    {
        return $this->attributes['extra_toppings'] = json_decode($value, true);
    }

    public function setRemovedToppingsAttribute($value)
    {
        $this->attributes['removed_toppings'] = json_encode($value, true);
    }
    public function getRemovedToppingsAttribute($value)
    {
        return $this->attributes['removed_toppings'] = json_decode($value, true);
    }

    public function setDrinkTypeAttribute($value)
    {
        $this->attributes['drink_type'] = json_encode($value, true);
    }
    public function getDrinkTypeAttribute($value)
    {
        return $this->attributes['drink_type'] = json_decode($value, true);
    }

    public function setDrinkNameAttribute($value)
    {
        $this->attributes['drink_name'] = json_encode($value, true);
    }
    public function getDrinkNameAttribute($value)
    {
        return $this->attributes['drink_name'] = json_decode($value, true);
    }

    public function setDeliveryAttribute($value)
    {
        $this->attributes['delivery'] = json_encode($value, true);
    }
    public function getDeliveryAttribute($value)
    {
        return $this->attributes['delivery'] = json_decode($value, true);
    }

    protected $casts = [
        // This code works fine when i'm saving items to the database
        // But It's giving me problems when i'm trying to edit items.

        /*'type' => 'string',
        'toppings' => 'string',
        'extras' => 'string',
        'drinks' => 'drinks',
        'delivery' => 'delivery',*/
    ];
}
