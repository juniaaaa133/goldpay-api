<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable , HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    public function role () {
        return $this->belongsTo(Role::class,'role_id');
    }
    public function state () {
        return $this->hasOne(State::class,'user_id');
    }
    public function township () {
        return $this->hasOne(Township::class,'user_id');
    }
    public function amount () {
        return $this->hasOne(Amount::class,'user_id');
    }
    public function number () {
        return $this->hasOne(Accountnumber::class,'user_id');
    }
    public function phone_number () {
        return $this->hasOne(Phone::class,'user_id');
    }

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
}
