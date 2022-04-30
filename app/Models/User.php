<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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

    /**
     * Get the user with a name.
     *
     * @param String $username
     */
    public static function find($username)
    {
        return self::query()->where('name', $username)->first();
    }

    /**
     * Get the user with a name or throw an exception.
     *
     * @param String $username
     * @throws ModelNotFoundException
     */
    public static function findOrFail($username)
    {
        $result = self::find($username);
        if(is_null($result)) throw new ModelNotFoundException("User '$username' is not found.");
        return $result;
    }
}
