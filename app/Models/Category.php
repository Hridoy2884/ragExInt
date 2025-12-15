<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    //Fillable fields for mass assignment
    protected $fillable = [
        'name',
        
        'slug',
        
        'status',
        'image',
    ];
}
