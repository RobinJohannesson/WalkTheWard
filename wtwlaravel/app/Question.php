<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = array('question', 'answer1', 'answer2', 'answer3', 'answer4', 'correctAnswer', 'imageSource', 'videoSource');
    
    public function Theme() {
        return $this->BelongsTo('Theme');
    }
}
