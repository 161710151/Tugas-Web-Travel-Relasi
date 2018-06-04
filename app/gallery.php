<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gallery extends Model
{
    protected $fillable = ['nama','photo'];
    public $timesstamps = true;
}
