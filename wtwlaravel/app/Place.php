<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $stationId
 * @property int $areaId
 * @property string $updated_at
 * @property string $created_at
 * @property Area $area
 * @property Station $station
 * @property BonusGame[] $bonusGames
 * @property PlaceInGame[] $placeInGames
 */
class Place extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'stationId', 'areaId', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function area()
    {
        return $this->belongsTo('App\Area', 'areaId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function station()
    {
        return $this->belongsTo('App\Station', 'stationId');
    }

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
