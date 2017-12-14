<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $question
 * @property string $answer1
 * @property string $answer2
 * @property string $answer3
 * @property string $answer4
 * @property int $correctAnswer
 * @property string $imageSource
 * @property string $videoSource
 * @property int $themeId
 * @property string $deleted_at
 * @property string $updated_at
 * @property string $created_at
 * @property Theme $theme
 * @property QuestionInGame[] $questionInGames
 */
class Question extends Model
{
    use SoftDeletes;
    /**
     * @var array
     */
    protected $fillable = ['question', 'answer1', 'answer2', 'answer3', 'answer4', 'correctAnswer', 'imageSource', 'videoSource', 'themeId', 'deleted_at', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function theme()
    {
        return $this->belongsTo('App\Theme', 'themeId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questionInGames()
    {
        return $this->hasMany('App\QuestionInGame', 'questionId');
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
