<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property boolean $hasGoneHome
 * @property int $dayAmount
 * @property boolean $wasEasyToPlay
 * @property string $created_at
 * @property string $updated_at
 * @property Patient[] $patients
 */
class statistics extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['hasGoneHome', 'dayAmount', 'wasEasyToPlay', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function patients()
    {
        return $this->hasMany('App\Patient', 'statisticId');
    }
}
