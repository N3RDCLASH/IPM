<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cijfer extends Model
{
    use HasFactory;
    protected $fillable = [
        "vak_id",
        "studentklas_id",
        "periode",
        "cijfer",
    ];
    protected $table = "cijfers";

    public function getCijfers()
    {
        return $this
            ->join("vakken", "vakken.id", "=", "cijfers.vak_id")
            ->join("studentklas", "studentklas.id", "=", "cijfers.studentklas_id")
            ->join('studenten', 'studenten.id', '=', 'studentklas.student_id')
            ->join('klassen', 'klassen.id', '=', 'studentklas.klas_id')
            ->get();
    }

    public function createCijfer($data)
    {
        return $this->create([
            "vak_id" => $data[1],
            "studentklas_id" => $data[2],
            "periode" => $data[3],
            "cijfer" => $data[4]
        ]);
    }
    public function updateCijfer($data)
    {
        return $this->update([
            "cijfer" => $data["cijfer"]
        ]);
    }
    protected function deleteCijfer($id)
    {
        return $this->find($id)->delete();
    }
}
