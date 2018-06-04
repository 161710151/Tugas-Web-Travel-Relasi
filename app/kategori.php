<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $fillable = ['nama_wisata'];
    public $timestamps = true;


    public function travel()
    {
        return $this->hasMany('App\travel','kategori_id');
    }
}
