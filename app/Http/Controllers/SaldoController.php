<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaldoController extends Controller
{
    //
    function index()
    {
        return view("pages.saldo");
    }
}
