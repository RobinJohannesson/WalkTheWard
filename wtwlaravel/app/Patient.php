<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = array('age', 'gender', 'roomType', 'cookie', 'distance');
    
    public function Game() {
        return $this->belongsTo('Game');
    }
    
    public function Character() {
        return $this->hasOne('Character');
    }
    
    public function Ward() {
        return $this->hasOne('Ward');
    }
}
