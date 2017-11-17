<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property boolean $isActive
 * @property string $updated_at
 * @property string $created_at
 * @property Game[] $games
 * @property Question[] $questions
 */
class Theme extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'isActive', 'updated_at', 'created_at'];

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
