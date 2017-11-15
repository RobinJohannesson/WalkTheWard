<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $age
 * @property string $gender
 * @property int $roomType
 * @property int $distanceInMeter
 * @property int $gameId
 * @property int $characterId
 * @property int $statisticId
 * @property int $wardId
 * @property string $created_at
 * @property string $updated_at
 * @property Character $character
 * @property Game $game
 * @property Statistic $statistic
 * @property Ward $ward
 */
class patients extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['age', 'gender', 'roomType', 'distanceInMeter', 'gameId', 'characterId', 'statisticId', 'wardId', 'created_at', 'updated_at'];

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
    public function statistic()
    {
        return $this->belongsTo('App\Statistic', 'statisticId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ward()
    {
        return $this->belongsTo('App\Ward', 'wardId');
    }
}
