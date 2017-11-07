<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = array('name');
    
    public function Question() {
        return $this->HasMany('Question');
    }
}
