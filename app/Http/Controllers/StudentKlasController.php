<?php

namespace App\Http\Controllers;

use App\Models\StudentKlas;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentKlasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $studentklas = new StudentKlas();
        $studentklas->addStudentToKlas($request->only(["klas_id", "student_id", "school_jaar"]));
        return redirect(route('klassen'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentKlas  $studentKlas
     * @return \Illuminate\Http\Response
     */
    public function show(StudentKlas $studentKlas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentKlas  $studentKlas
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentKlas $studentKlas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentKlas  $studentKlas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentKlas $studentKlas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentKlas  $studentKlas
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentKlas $studentKlas)
    {
        //
    }

    public function getStudentenPerKlas($id)
    {
        $studentklas = new StudentKlas();
        $studenten =[];
        $data = $studentklas->getStudentenPerKlas($id);
        foreach ($data as $student) {
            $studenten []= Student::find($student->id);
        }
        return $studenten;
    }
}
