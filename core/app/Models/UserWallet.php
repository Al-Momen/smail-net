<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWallet extends Model
{
    use HasFactory;
    protected $table = 'user_wallet';
    protected $fillable = [
        'user_id',
        'balance',
    ];
    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
    ];

}