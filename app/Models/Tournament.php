<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;
    protected $fillable = ['admin_id', 'title', 'slug', 'thumbnails', 'description', 'slot', 'type', 'price', 'mode', 'schedule_date', 'end_register_date', 'is_active'];

    const TYPE_FREE = 'free';
    const TYPE_PREMIUM = 'premium';

    const MODE_SINGLE = 'single';
    const MODE_DOUBLE = 'double';
    const MODE_GROUP = 'group';

    public function getThumbnails()
    {
        return "/storage/" . $this->thumbnails;
    }

    public function userTournaments()
    {
        return $this->hasMany(UserTournament::class, 'tournament_id', 'id')->where('status', 'active');
    }
}
