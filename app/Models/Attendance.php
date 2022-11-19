<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable=[
        'student_id',
        'grade_id',
        'classroom_id',
        'section_id',
        'teacher_id',
        'attendence_date',
        'attendence_status',
    ];
    protected $table = 'attendances';

    public function students()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }

    public function gender()
    {
        return $this->belongsTo('App\Models\Gender', 'gender_id');
    }
    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id');
    }


    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'Classroom_id');
    }


    public function section()
    {
        return $this->belongsTo('App\Models\Sections', 'section_id');
    }
    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher', 'teacher_id');
    }

}
