<?php

namespace App\Models;

use App\Models\Skill;
use App\Models\SkillRequest;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // User Skills
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    // Requests sent by this user
    public function sentRequests()
    {
        return $this->hasMany(SkillRequest::class, 'sender_id');
    }

    // Requests received by this user
    public function receivedRequests()
    {
        return $this->hasMany(SkillRequest::class, 'receiver_id');
    }
}