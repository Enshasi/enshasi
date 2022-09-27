<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Teacher extends Model
{
    use HasTranslations ;
    public $translatable = ['Name'] ;
    protected $guarded = [] ;
    // علاقة بين المعلمين والتخصصات لجلب اسم التخصص
    public function specializations()
    {
        return $this->belongsTo('App\Models\specializations', 'Specialization_id');
    }

    // علاقة بين المعلمين والانواع لجلب جنس المعلم
    public function genders()
    {
        return $this->belongsTo('App\Models\Gender', 'Gender_id');
    }


// علاقة المعلمين مع الاقسام
    public function Sections()
    {
        return $this->belongsToMany(Sections::class, 'teacher_section' , 'teacher_id');
    }
}
