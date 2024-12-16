<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodTable extends Model
{
    use HasFactory;

    protected $table = 'food_tables';

    protected $fillable = [
        'id',
        'number',
        'capacity',
        'status',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;
}
