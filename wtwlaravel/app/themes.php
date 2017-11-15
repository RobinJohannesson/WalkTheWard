<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property boolean $isActive
 * @property string $created_at
 * @property string $updated_at
 * @property Game[] $games
 * @property Question[] $questions
 */
class themes extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', "isActive", 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function games()
    {
        return $this->hasMany('App\Game', 'themeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany('App\Question', 'themeId');
    }
}
