<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // fillable is the column you want user to input

    protected $fillable = [
        'name',
        'qty',
        'price',
        'description'
    ];
}
