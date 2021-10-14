<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title',
        'answers',
        'right_answer',
        'score',
    ];

    public function quuiz() {
        return $this->belongsTo('App\Quiz');
    }
}
