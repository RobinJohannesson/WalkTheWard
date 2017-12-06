<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property boolean $hasGoneHome
 * @property int $dayAmount
 * @property boolean $wasEasyToPlay
 * @property string $explainWhy
 * @property string $updated_at
 * @property string $created_at
 * @property Patient[] $patients
 */
class Statistics extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['hasGoneHome', 'dayAmount', 'wasEasyToPlay', 'explainWhy', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function patients()
    {
        return $this->hasMany('App\Patient', 'statisticId');
    }
}
