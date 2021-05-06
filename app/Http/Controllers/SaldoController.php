<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Transactie;
use App\Models\Opwaardering;
use App\Models\Service;
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
            return view("pages.saldo")->with(["opwaarderingen" => $opwaardering->getAllOpwaarderingen()]);
        };
        if (Auth::user()->hasRole('student')) {
            $saldo = [];
            return view("pages.saldo")->with(["transacties" => $transacties->getTransactiesPerUser(auth()->user()->id), "opwaarderingen" => $opwaardering->getOpwaarderingenPerUser(auth()->user()->id), "saldo" => $this->saldoBerekenen(auth()->user()->id)]);
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
        $opwaarderingen = array_filter($opwaardering->getOpwaarderingenPerUser($user_id)->toArray(), fn ($record) => $record['status'] === "confirmed");
        $transacties = array_filter($transacties->getTransactiesPerUser($user_id)->toArray());


        // saldo = totaal opwaarderingen - totaal transacties
        $saldo =  array_reduce($opwaarderingen, fn ($acc, $current) => $acc + $current['bedrag'])
            - array_reduce($transacties, fn ($acc, $current) => $acc + $current['service_prijs']);
        return $saldo;
    }
    public function transactieMogelijk($user_id, $service_id)
    {
        $saldo = $this->saldoBerekenen($user_id);
        $service_prijs = Service::find($service_id)->service_prijs;
        return  $saldo > $service_prijs;
    }

    public function transactieAanmaken($user_id, $service_id)
    {
        $transactie = new Transactie;
        if ($this->transactieMogelijk($user_id, $service_id)) {
            return $transactie->createTransactie($user_id, $service_id);
        }
    }
    public function opwaarderingAccepteren($opwaardering_id)
    {
        if ($opwaardering =  Opwaardering::find($opwaardering_id)) {
            $opwaardering->update(['status' => 'confirmed']);
            return redirect('saldo');
        }
    }
    public function opwaarderingAfkeuren($opwaardering_id)
    {
        if ($opwaardering =  Opwaardering::find($opwaardering_id)) {
            $opwaardering->update(['status' => 'declined']);
            return redirect('saldo');
        }
    }
}
