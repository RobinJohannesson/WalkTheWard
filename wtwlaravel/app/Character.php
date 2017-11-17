<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $imageSource
 * @property string $updated_at
 * @property string $created_at
 * @property Patient[] $patients
 */
class Character extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'imageSource', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function patients()
    {
        return $this->hasMany('App\Patient', 'characterId');
    }
}
