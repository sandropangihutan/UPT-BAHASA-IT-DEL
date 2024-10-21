<?php

namespace App\Models;

use App\Models\RequestInventory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    public function requests()
    {
        return $this->hasMany(RequestInventory::class);
    }
}
