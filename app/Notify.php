<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Notify extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'notification';

    protected $fillable = [
        'name', 'alarm_time','sunday_switch','monday_switch','tuesday_switch','wednesday_switch','thursday_switch','friday_switch','saturday_switch','active','uid'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
