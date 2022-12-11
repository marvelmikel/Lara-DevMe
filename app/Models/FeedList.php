<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedList extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'feed_url',
        'title',
        'story_count',
        'public_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
