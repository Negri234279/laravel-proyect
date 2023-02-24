<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'sport_id',
    ];

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }
}
