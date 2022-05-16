<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;

    protected $fillable=[
        'author_id',
        'rating_id',
        'research_id',
        'reviewer_id'
    ];
}
