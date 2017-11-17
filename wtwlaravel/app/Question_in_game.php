<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $questionId
 * @property int $gameId
 * @property boolean $isAnswered
 * @property string $updated_at
 * @property string $created_at
 * @property Game $game
 * @property Question $question
 */
class Question_in_game extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['isAnswered', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function game()
    {
        return $this->belongsTo('App\Game', 'gameId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo('App\Question', 'questionId');
    }
}
