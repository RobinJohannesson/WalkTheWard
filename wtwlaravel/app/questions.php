<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $question
 * @property string $answer1
 * @property string $answer2
 * @property string $answer3
 * @property string $answer4
 * @property string $correctAnswer
 * @property string $imageSource
 * @property string $videoSource
 * @property int $themeId
 * @property string $created_at
 * @property string $updated_at
 * @property Theme $theme
 * @property QuestionsInGame[] $questionsInGames
 */
class questions extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['question', 'answer1', 'answer2', 'answer3', 'answer4', 'correctAnswer', 'imageSource', 'videoSource', 'themeId', 'created_at', 'updated_at'];

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
    public function questionsInGames()
    {
        return $this->hasMany('App\QuestionsInGame', 'questionId');
    }
}
