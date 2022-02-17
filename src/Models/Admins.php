<?php

namespace Ddkits\Adminpanel\Models;

use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    protected $table = 'admins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid',
        'level'
    ];
}
