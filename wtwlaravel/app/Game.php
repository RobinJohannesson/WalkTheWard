<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = array('currentArea', 'currentTheme');
    
    public function Patient() {
        return $this->hasOne('Patient');
    }
}
