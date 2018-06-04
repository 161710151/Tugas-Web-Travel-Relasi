<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class travel extends Model
{
    protected $fillable = ['nama_wisata','artikel','kategori_id'];
    public $timesstamps = true;

    public function kategori()
    {
        return $this->belongsTo('App\kategori','kategori_id');
    }
}