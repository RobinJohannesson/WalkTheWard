<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property boolean $hasGoneHome
 * @property int $dayAmount
 * @property boolean $wasEasyToPlay
 * @property int $patientId
 * @property string $created_at
 * @property string $updated_at
 * @property Patient $patient
 */
class statistics extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['hasGoneHome', 'dayAmount', 'wasEasyToPlay', 'patientId', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo('App\Patient', 'patientId');
    }
}
