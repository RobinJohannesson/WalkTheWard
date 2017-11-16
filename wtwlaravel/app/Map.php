<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $updated_at
 * @property string $created_at
 * @property Area[] $areas
 */
class Map extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function areas()
    {
        return $this->hasMany('App\Area', 'mapId');
    }
}
