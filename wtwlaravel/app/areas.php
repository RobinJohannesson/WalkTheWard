<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $mapId
 * @property string $created_at
 * @property string $updated_at
 * @property Map $map
 * @property Game[] $games
 * @property Place[] $places
 */
class areas extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'mapId', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function map()
    {
        return $this->belongsTo('App\Map', 'mapId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function games()
    {
        return $this->hasMany('App\Game', 'areaId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function places()
    {
        return $this->hasMany('App\Place', 'areaId');
    }
}
