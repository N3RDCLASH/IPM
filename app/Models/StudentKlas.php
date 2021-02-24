<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentKlas extends Model
{
    use HasFactory;
    protected $table = "studentklas";
    public function addStudentToKlas($data)
    {
        $this->klas_id = $data["klas_id"];
        $this->student_id = $data["student_id"];
        $this->school_jaar = $data["school_jaar"];
        $this->save();
    }

    public function getStudentenPerKlas($id)
    {
        return $this->where('klas_id', $id)->get();
    }
}
