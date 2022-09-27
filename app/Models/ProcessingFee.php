<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessingFee extends Model
{
    public function student(){
        return $this->belongsTo('App\Models\student', 'student_id');
    }
}
