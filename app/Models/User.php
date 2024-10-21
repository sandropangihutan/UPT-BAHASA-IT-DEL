<?php

namespace App\Models;

use App\Models\Role;
use App\Models\RequestRoom;
use App\Models\Announcement;
use App\Models\Conversation;
use App\Models\RequestInventory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'role_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    public function request_rooms()
    {
        return $this->hasMany(RequestRoom::class);
    }

    public function request_inventories()
    {
        return $this->hasMany(RequestInventory::class);
    }

    public function conversations()
    {
        return $this->belongsToMany(Conversation::class);
    }
}
