<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Electrodomestic extends Model
{
    use HasFactory;

    protected $table = 'electrodomestic';
    protected $fillable = ['name', 'price', 'image', 'description', 'category', 'brand'];

    public $timestamps = false;
}
