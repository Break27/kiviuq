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
        'username',
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
     * Get the account aliased to the user.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function account()
    {
        return Account::query()
            ->where('username', $this->username)
            ->where('domain', config('app.domain'))
            ->first();
    }

    /**
     * Get user with the specific username or id.
     *
     * @param string|int $key
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public static function find($key)
    {
        return self::query()->where(is_int($key)
            ? 'id'
            : 'username'
            , $key)->first();
    }

    /**
     * Get the user with the specific name or throw an exception.
     *
     * @param string|int $key
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object
     */
    public static function findOrFail($key)
    {
        $result = self::find($key);
        if(is_null($result)) throw new ModelNotFoundException("User '$key' (".is_int($key)
            ? 'id'
            : 'username'
            .") is not found.");
        return $result;
    }
}
