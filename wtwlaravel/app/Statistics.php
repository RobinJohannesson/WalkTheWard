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
* @property Patient $patient
*/
class Statistics extends Model
{
    /**
    * @var array
    */
    protected $fillable = ['patientId', 'hasGoneHome', 'dayAmount', 'wasEasyToPlay', 'explainWhy', 'updated_at', 'created_at'];

    protected $dates = ['updated_at', 'created_at'];

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function patients()
    // {
    //     return $this->hasMany('App\Patient', 'statisticId');
    // }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function patient()
    {
        return $this->belongsTo('App\Patient', 'patientId');
    }
    

}
