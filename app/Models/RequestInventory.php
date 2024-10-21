<?php

namespace App\Models;

use App\Models\User;
use App\Models\Inventory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestInventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'inventory_id',
        'date_start',
        'date_end',
        'status',
        'description',
    ];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
