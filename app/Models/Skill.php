<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',

        'category_id',

        'title',

        'description',

        'experience_level',

        'created_by'

    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Skill Requests
    public function skillRequests()
    {
        return $this->hasMany(SkillRequest::class);
    }
}