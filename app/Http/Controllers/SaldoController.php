<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class SaldoController extends Controller
{
    //
    function index()
    {
        if (auth()->user()->hasRole('admin')) {
        };
        return view("pages.saldo")->with(["students" => Student::all()]);
        if (auth()->user()->hasRole('student')) {
        };
        return view("pages.saldo");
    }
}
