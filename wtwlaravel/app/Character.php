<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = array('name', 'imageSource');
    
    public function Patient() {
        return $this->belongsTo('Patient');
    }
}
