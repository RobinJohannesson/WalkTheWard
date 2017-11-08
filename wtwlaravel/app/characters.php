<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $imageSource
 * @property string $created_at
 * @property string $updated_at
 * @property Patient[] $patients
 */
class characters extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'imageSource', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function patients()
    {
        return $this->hasMany('App\Patient', 'characterId');
    }
}
