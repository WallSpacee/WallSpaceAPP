<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, Notifiable;
    //
    protected $fillable = ['title', 'author', 'slug', 'body',];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}