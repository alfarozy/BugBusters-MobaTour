<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTournament extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'tournament_id', 'code', 'team_name', 'whatsapp',
        'player_captain_nickname', 'player_captain_id',
        'player_2_nickname', 'player_2_id',
        'player_3_nickname', 'player_3_id',
        'player_4_nickname', 'player_4_id',
        'player_5_nickname', 'player_5_id',
        'player_alternative_nickname', 'player_alternative_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
}
