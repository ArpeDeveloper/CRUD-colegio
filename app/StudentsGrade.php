<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Grade;
use App\Student;

class StudentsGrade extends Model
{
	protected $fillable = ["id","student_id","grade_id","section"];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
