<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $placeId
 * @property int $gameId
 * @property int $numberOfStars
 * @property bool $activeRound
 * @property string $updated_at
 * @property string $created_at
 * @property Game $game
 * @property Place $place
 */
class Place_in_game extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['numberOfStars', 'activeRound', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function game()
    {
        return $this->belongsTo('App\Game', 'gameId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function place()
    {
        return $this->belongsTo('App\Place', 'placeId');
    }
}
