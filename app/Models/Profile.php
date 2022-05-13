<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Profile extends Model
{
    public $incrementing = false;

    protected $primaryKey = 'username';

    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'avatar',
        'bio',
    ];

    /**
     * Get profile with the specific username.
     *
     * @param string $username
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public static function find(string $username)
    {
        return self::query()->where('username', $username)->first();
    }

    /**
     * Get profile with the specific username or throw an exception.
     *
     * @param string $username
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object
     */
    public static function findOrFail(string $username)
    {
        $result = self::find($username);
        if(is_null($result)) throw new ModelNotFoundException("Profile '$username' (username) is not found.");
        return $result;
    }
}
