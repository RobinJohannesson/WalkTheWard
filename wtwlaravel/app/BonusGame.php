<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BonusGame extends Model
{
    protected $fillable = array('letterToDiscard', 'imageSource');
    
    public function Place() {
        return $this->belongsTo('App\Place');
    }
    
    public function Games() {
        return $this->belongsToMany('App\Game', 'bonus_game_in_games', 'bonusGameId', 'gameId');
    }
}
