<?php

namespace App\Http\Controllers;

use App\Models\Klas;
use Illuminate\Http\Request;
use App\Http\Controllers\StudentKlasController;
use App\Models\Richting;
use App\Models\StudentKlas;

class KlasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $klas = new Klas;
        $richtingen = Richting::all();
        return view('pages.klassen')->with(["klassen" => $klas->getKlassen(), 'richtingen' => $richtingen]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $klas = new Klas();
        $klas->createKlas($request->only(["klas", "richting_id", "jaar"]));
        return redirect(route('klassen'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $klas = Klas::find($id);
        $studentklas = new StudentKlasController();
        $studenten = $studentklas->getStudentenPerKlas($id);
        return view('pages.klassen.klas')->with(['klas' => $klas, "studenten" => $studenten]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $klas = Klas::find($id);
        return view('pages.klassen.edit')->with(['klas' => $klas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $klas = new Klas();
        $klas->updateKlas($request->only(["klas", "richting_id", "jaar"]), $id);
        return redirect(route('klassen'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $klas = new Klas();
        $klas->deleteKlas($id);
        return redirect(route('klassen'));
    }
}
