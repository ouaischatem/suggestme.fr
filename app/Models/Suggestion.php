<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function getUpVotesAttribute()
    {
        return $this->votes()->where('vote_type', 1)->count();
    }

    public function getDownVotesAttribute()
    {
        return $this->votes()->where('vote_type', 0)->count();
    }
}
