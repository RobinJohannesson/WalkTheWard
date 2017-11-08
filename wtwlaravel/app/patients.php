<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $age
 * @property string $gender
 * @property int $roomType
 * @property string $cookie
 * @property int $distanceInMeter
 * @property int $gameId
 * @property int $characterId
 * @property int $wardId
 * @property string $created_at
 * @property string $updated_at
 * @property Character $character
 * @property Game $game
 * @property Ward $ward
 * @property Statistic[] $statistics
 */
class patients extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['age', 'gender', 'roomType', 'cookie', 'distanceInMeter', 'gameId', 'characterId', 'wardId', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function character()
    {
        return $this->belongsTo('App\Character', 'characterId');
    }

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
    public function ward()
    {
        return $this->belongsTo('App\Ward', 'wardId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statistics()
    {
        return $this->hasMany('App\Statistic', 'patientId');
    }
}
