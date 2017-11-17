<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $lettersToDiscard
 * @property string $imageSource
 * @property int $placeId
 * @property string $updated_at
 * @property string $created_at
 * @property Place $place
 * @property BonusGameInGame[] $bonusGameInGames
 */
class Bonus_game extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['lettersToDiscard', 'imageSource', 'placeId', 'updated_at', 'created_at'];

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
    public function bonusGameInGames()
    {
        return $this->hasMany('App\BonusGameInGame', 'bonusGameId');
    }
}
