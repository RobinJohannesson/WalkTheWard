<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = array('name', 'description');
    
    public function Station() {
        return $this->belongsTo('Station');
    }
    
    public function Area() {
        return $this->belongsTo('Area');
    }
}
