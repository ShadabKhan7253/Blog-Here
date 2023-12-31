<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ADMIN = 'admin';
    const AUTHOR = 'author';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function blogs() {
        return $this->hasMany(Blog::class);
    }

    public function isAdmin(): bool {
        return $this->role === "admin";
    }

    public function isOwner(Blog $blog): bool {
        return $this->id === $blog->user_id;
    }

    public function emailVerifiedAt(): bool {
        return $this->email_verified_at != NULL;
    }

    public function changeRole(string $role) {
        return $this->role = $role;
    }

    public function getNameAttribute() {
        return $this->attributes['name'];
    }
}
