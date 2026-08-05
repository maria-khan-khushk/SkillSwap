<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'skill_id',
        'message',
        'status',
    ];

    // User who sent the request
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    // User who received the request
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    // Requested skill
    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }
}