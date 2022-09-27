<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Question extends Model
{
    use HasTranslations;
    public $translatable = ['name'];
    protected $guarded = [] ;
    protected $table = 'questions';



    public function quizze()
    {
        return $this->belongsTo('App\Models\Quizze', 'quizze_id');
    }


}
