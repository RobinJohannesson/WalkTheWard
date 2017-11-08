<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $bonusGameId
 * @property int $gameId
 * @property boolean $isCompleted
 * @property string $created_at
 * @property string $updated_at
 * @property BonusGame $bonusGame
 * @property Game $game
 */
class bonus_game_in_games extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['isCompleted', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bonusGame()
    {
        return $this->belongsTo('App\BonusGame', 'bonusGameId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function game()
    {
        return $this->belongsTo('App\Game', 'gameId');
    }
}
