<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'studenten';

    protected $fillable =
    [
        'achter_naam', 'voor_naam', 'geboorte_datum', 'uitgave_datum', 'verval_datum', 'saldo'
    ];

    public function getFullStudentData($id)
    {
        return $this->where('user_id', $id)
            ->leftJoin('studentklas', 'studentklas.student_id', '=', 'studenten.id')
            ->leftJoin('klassen', 'klassen.id', '=', 'studentklas.klas_id')
            ->leftJoin('richtingen', 'richtingen.id', '=', 'klassen.richting_id')
            ->first()->toArray();
    }

    public function UpdateStudent($data)
    {
        $student = $this->findOrFail($data->id);
        $student->achter_naam = $data->Aname;
        $student->voor_naam = $data->Vname;
        $student->geboorte_datum = $data->Geboorte;
        $student->geboorte_plaats = $data->Plaats;
        $student->uitgave_datum = $data->Uitgave;
        $student->verval_datum = $data->Verval;
        $student->saldo = $data->Saldo;
        $student->save();
    }

    public function CreateStudent($user_id)
    {

        $this->achter_naam = request('Aname');
        $this->voor_naam = request('Vname');
        $this->geboorte_datum = request('Geboorte');
        $this->geboorte_plaats = request('Plaats');
        $this->uitgave_datum = request('Uitgave');
        $this->verval_datum = request('Verval');
        $this->email = request('email');
        $this->saldo = request('Saldo');
        $this->user_id =  $user_id;
        $this->save();
    }
}
