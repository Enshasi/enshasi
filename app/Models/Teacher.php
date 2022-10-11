<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Authenticatable
{
    use HasTranslations ;
    public $translatable = ['Name' ] ;
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
        return $this->belongsToMany('App\Models\Sections','teacher_section');
    }
}
