<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date_start',
        'date_end',
        'status',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
