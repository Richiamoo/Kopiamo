<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'menuName',
        'menuDesc',
        'menuType',
        'menuPrice',
        'coffee_photo_path',
    ];
}
