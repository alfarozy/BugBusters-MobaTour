<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'tournament_id', 'member_tournament_id', 'invoice', 'price', 'order_date', 'expired_date', 'payment_date', 'invoice_url', 'status'];
}
