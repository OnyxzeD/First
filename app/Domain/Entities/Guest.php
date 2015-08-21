<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = 'guest';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'phone', 'email', 'site', 'message'];
    //
}
