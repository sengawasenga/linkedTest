<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Message;
use App\Models\Station;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'firstname',
        'number',
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

    // managing different relationships

    public function sendFriendRequest(User $user)
    {
        $this->friendRequestsSent()->attach($user);
    }

    public function acceptFriendRequest(User $user)
    {
        $this->friends()->attach($user);
        $this->friendRequestsReceived()->where('user_id', $user->id)->delete();
    }

    public function declineFriendRequest(User $user)
    {
        $this->friendRequestsReceived()->where('user_id', $user->id)->delete();
    }

    public function friendRequestsSent()
    {
        return $this->belongsToMany(User::class, 'friend_requests', 'user_id', 'friend_id')
            ->withTimestamps();
    }

    public function friendRequestsReceived()
    {
        return $this->belongsToMany(User::class, 'friend_requests', 'friend_id', 'user_id')
            ->withTimestamps();
    }

    public function friends()
    {
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id')
            ->withTimestamps();
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function isFriendWith(User $user)
    {
        return $this->friends()->where('friend_id', $user->id)->exists();
    }
}
