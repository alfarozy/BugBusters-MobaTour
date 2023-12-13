<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResset extends Model
{
    use HasFactory;

    protected $table = 'password_reset_tokens';

    protected $fillable = ['email', 'token'];

    public $timestamps = false;
}
