<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Teacher;

class Grade extends Model
{
    //
    protected $fillable = ["id","name","teacher_id"];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
