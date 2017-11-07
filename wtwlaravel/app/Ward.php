<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $fillable = array('name', 'address', 'description', 'imageSource');
}
