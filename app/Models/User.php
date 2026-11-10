<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Spatie\Sluggable\Attributes\Sluggable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
#[Sluggable(from: 'name', to: 'slug')]
class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function followers() {
        return $this->belongsToMany(User::class, 'follows', 'followee_id', 'follower_id');
    }

    public function followees() {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'followee_id');
    }

    public function authHasFollowed(): Attribute {
        return Attribute::get(function (){
            if(!Auth::check()){
                return false;
            }
            return $this->followers()->where('follower_id', Auth::user()->id)->exists();
        });
    }

    public function feed() {
        $followeeIds = $this->followees()->select('id')->get()->pluck('id');
        return Post::whereIn('user_id', $followeeIds);
    }
}
