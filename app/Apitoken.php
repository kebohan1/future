<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apitoken extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'apitoken';

    protected $fillable = [
        'token',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
