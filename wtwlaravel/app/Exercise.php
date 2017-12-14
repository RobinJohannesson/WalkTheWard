<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $videoSource
 * @property boolean $isActive
 * @property string $updated_at
 * @property string $created_at
 * @property ExercisesInGame[] $exercisesInGames
 */
class Exercise extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['videoSource', 'isActive', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exercisesInGames()
    {
        return $this->hasMany('App\ExercisesInGame', 'exerciseId');
    }
}
