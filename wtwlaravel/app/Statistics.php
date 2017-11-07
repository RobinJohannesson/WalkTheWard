<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    protected $fillable = array('goHome', 'dayAmount', 'wasEasyToPlay');
    
    public function Patient() {
        return $this->belongsTo('Patient');
    }
}
