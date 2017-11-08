<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $stationId
 * @property int $areaId
 * @property string $created_at
 * @property string $updated_at
 * @property BonusGame[] $bonusGames
 * @property PlaceInGame[] $placeInGames
 */
class places extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'stationId', 'areaId', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bonusGames()
    {
        return $this->hasMany('App\BonusGame', 'placeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function placeInGames()
    {
        return $this->hasMany('App\PlaceInGame', 'placeId');
    }
}
