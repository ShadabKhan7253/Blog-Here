<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function blog() {
        return $this->belongsTo(Blog::class);
    }

    public function replies() {
        return $this->hasMany(Comment::class, 'reply_to');
    }

    public function blogs() {
        return $this->belongsTo(Blog::class);
    }

    public function getImagePathAttribute() {
        return '/storage/'.$this->attributes['image_path'];
    }
}
