<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $placeId
 * @property int $gameId
 * @property int $numberOfStars
 * @property string $created_at
 * @property string $updated_at
 * @property Game $game
 * @property Place $place
 */
class place_in_games extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['numberOfStars', 'created_at', 'updated_at'];

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
