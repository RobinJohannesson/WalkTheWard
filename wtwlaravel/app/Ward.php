<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $description
 * @property string $imageSource
 * @property string $updated_at
 * @property string $created_at
 * @property Patient[] $patients
 * @property Station[] $stations
 */
class Ward extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'address', 'description', 'imageSource', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function patients()
    {
        return $this->hasMany('App\Patient', 'wardId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stations()
    {
        return $this->hasMany('App\Station', 'wardId');
    }
}
