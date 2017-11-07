<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BonusGame extends Model
{
    protected $fillable = array('letterToDiscard', 'imageSource');
    
    public function Place() {
        return $this->belongsTo('Place');
    }
}
