<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'tournament_id', 'user_tournament_id', 'invoice', 'price', 'order_date', 'expired_date', 'payment_date', 'invoice_url', 'status'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userTournament()
    {
        return $this->belongsTo(UserTournament::class);
    }
    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
}
