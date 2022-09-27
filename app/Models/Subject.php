<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Subject extends Model
{
    use HasTranslations;
    public $translatable = ['name'];
    public function gender(){
        return $this->belongsTo('App\Models\Gender' , 'gender_id');
    }
    public function grade(){
        return $this->belongsTo('App\Models\Grade' , 'grade_id');
    }
    public function classroom(){
        return $this->belongsTo('App\Models\Classroom' , 'classroom_id');
    }
    public function teacher(){
        return $this->belongsTo('App\Models\Teacher' , 'teacher_id');
    }

}
