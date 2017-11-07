<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = array('name');
    
    public function Map() {
        return $this->belongsTo('Map');
    }
}
