<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $bonusGameId
 * @property int $gameId
 * @property boolean $isCompleted
 * @property string $updated_at
 * @property string $created_at
 * @property BonusGame $bonusGame
 * @property Game $game
 */
class Bonus_game_in_game extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['isCompleted', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bonusGame()
    {
        return $this->belongsTo('App\Bonus_Game', 'bonusGameId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function game()
    {
        return $this->belongsTo('App\Game', 'gameId');
    }
}
