<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $imageSource
 * @property int $wardId
 * @property string $updated_at
 * @property string $created_at
 * @property Ward $ward
 * @property Place[] $places
 */
class Station extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['imageSource', 'wardId', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ward()
    {
        return $this->belongsTo('App\Ward', 'wardId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function places()
    {
        return $this->hasMany('App\Place', 'stationId');
    }
}
