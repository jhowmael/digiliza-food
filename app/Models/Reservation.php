<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);  // Relacionamento de muitos para um (Reservation -> User)
    }

    // Defina a relação com o FoodTable (mesa)
    public function foodTable()
    {
        return $this->belongsTo(FoodTable::class);  // Relacionamento de muitos para um (Reservation -> FoodTable)
    }

    protected $table = 'reservations';

    protected $fillable = [
        'user_id',
        'food_table_id',
        'occupation',
        'entry',
        'finished',
        'canceled',
        'status'
    ];

    protected $dates = ['entry', 'created_at', 'updated_at'];

    public $timestamps = true;
}
