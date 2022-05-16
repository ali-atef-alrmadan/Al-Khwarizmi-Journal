<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class research extends Model
{
    use HasFactory;
    protected $fillable=[
        'research_title',
        'status_research',
        'type_research',
        'abstract',
        'address_file',
        'research_field',
        'address_img'
    ];

    public function review()
{
    return $this->belongsTo(review::class, "id", "research_id");
}
}
