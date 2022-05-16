<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    use HasFactory;
    protected $fillable=[
        'suggest',
        'decision',
        'research_id'
    ];

    public function review()
{
    return $this->belongsTo(review::class, "id", "rating_id");
}
}
