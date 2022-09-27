<?php

namespace App\Models;
use App\Models\Grade;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model
{
    use HasTranslations ;
    public $translatable = ['Name_Class'];
    protected $table = 'Classrooms';
    public $timestamps = true;
    public  $fillable = ['id' , 'Name_Class'];
    public function Grades()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }

}
