<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\Sections ;
class Grade extends Model
{
    use HasTranslations;
    public $translatable = ['name'];

    protected $fillable = ['Name' , 'Notes'] ;
    protected $table = 'Grades';
    public $timestamps = true;

    // علاقة المراحل الدراسية لجلب الاقسام المتعلقة بكل مرحلة

    public function Sections()
    {
        return $this->hasMany('App\Models\Sections', 'Grade_id');
    }
}
