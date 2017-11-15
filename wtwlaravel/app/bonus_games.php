<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $lettersToDiscard
 * @property string $imageSource
 * @property int $placeId
 * @property string $created_at
 * @property string $updated_at
 * @property Place $place
 * @property BonusGamesInGame[] $bonusGamesInGames
 */
class bonus_games extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['lettersToDiscard', 'imageSource', 'placeId', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function place()
    {
        return $this->belongsTo('App\Place', 'placeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bonusGamesInGames()
    {
        return $this->hasMany('App\BonusGamesInGame', 'bonusGameId');
    }
}
