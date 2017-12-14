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
 * @property int $wardId
 * @property string $updated_at
 * @property string $created_at
 * @property Character $character
 * @property Game $game
 * @property Statistics $statistics
 * @property Ward $ward
 */
class Patient extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['age', 'gender', 'roomType', 'distanceInMeter', 'gameId', 'characterId', 'wardId', 'updated_at', 'created_at'];

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
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function statistics()
    {
        return $this->hasOne('App\Statistics', 'patientId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ward()
    {
        return $this->belongsTo('App\Ward', 'wardId');
    }
}
