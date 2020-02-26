<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserrDetail extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['user_id', 'name','email','contact','profile_picture'];

    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [];

    /**
     * fields will be Carbon-ized
     * @var array
     */
    protected $dates = [];
    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [
        'user_id' => 'int',
        'name' => 'string',
        'email' => 'string',
        'contact' => 'string',
        'profile_picture' => 'string',
    ];

    public static function saveUserDetail($validated,$userId)
    {
        $data = [
            'user_id'=>$userId,
            'name'=>$validated['name'],
            'email'=>$validated['email'],
            'contact'=>$validated['contact'],
            'profile_picture'=>''
        ];
        return Self::create($data);
    }
}
