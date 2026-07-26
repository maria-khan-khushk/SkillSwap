<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [

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
}