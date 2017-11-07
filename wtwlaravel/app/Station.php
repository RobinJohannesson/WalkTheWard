<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $fillable = array('imageSource');
    
    public function Ward() {
        return $this->belongsTo('Ward');
    }
}
