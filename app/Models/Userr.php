<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userr extends Model
{

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['username', 'password','user_type'];

    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded = ['created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * fields will be Carbon-ized
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];
    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [
        'username' => 'string',
        'password' => 'string',
        'user_type' => 'int',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    public static function saveUser($validated)
    {
        $data = [
            'username' => $validated['username'],
            'password' => bcrypt($validated['password']),
            'user_type' => '2',
        ];

        $query = Self::create($data);
        return $query->id;
    }
}
