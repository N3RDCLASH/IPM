<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Transactie;
use App\Models\Opwaardering;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaldoController extends Controller
{
    //
    function index()
    {
        $transacties = new Transactie;
        $opwaardering = new Opwaardering;

        if (Auth::user()->hasRole('admin')) {
            return view("pages.saldo")->with(["opwaarderingen" => $opwaardering->all()]);
        };
        if (Auth::user()->hasRole('student')) {
            $saldo = [];
            return view("pages.saldo")->with(["transacties" => $transacties->getTransactiesPerUser(auth()->user()->id), "opwaarderingen" => $opwaardering->getAllOpwaarderingen(auth()->user()->id), "saldo" => $this->saldoBerekenen(auth()->user()->id)]);
        };
    }

    public function saldoOpwaarderen(Request $request)
    {
        // dd($request);
        $opwaardering = new Opwaardering;
        $opwaardering->createOpwaardering($request->only('bedrag'));
        return redirect(route('saldo'));
    }

    public function saldoBerekenen($user_id)
    {
        $transacties = new Transactie;
        $opwaardering = new Opwaardering;

        // Filter the array to include confirmed records
        $opwaarderingen = array_filter($opwaardering->getAllOpwaarderingen($user_id)->toArray(), fn ($record) => $record['status'] === "confirmed");
        $transacties = array_filter($transacties->getTransactiesPerUser($user_id)->toArray());


        // saldo = totaal opwaarderingen - totaal transacties
        $saldo =  array_reduce($opwaarderingen, fn ($acc, $current) => $acc + $current['bedrag'])
            - array_reduce($transacties, fn ($acc, $current) => $acc + $current['service_prijs']);
        return $saldo;
    }
}
