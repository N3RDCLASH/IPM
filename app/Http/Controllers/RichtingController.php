<?php

namespace App\Http\Controllers;

use App\Models\Richting;
use Illuminate\Http\Request;

class RichtingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $richtingen = Richting::all();
        return view('pages.richtingen')->with(['richtingen' => $richtingen]);
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
        $richting = new Richting();
        $richting->createRichting($request->only(["richting_naam"]));
        return redirect()->action([RichtingController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Richting  $richting
     * @return \Illuminate\Http\Response
     */
    public function show(Richting $richting, $id)
    {
        $data = $richting->find($id);
        return view('pages.richtingen.richting')->with(['richting' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Richting  $richting
     * @return \Illuminate\Http\Response
     */
    public function edit(Richting $richting, $id)
    {
        //
        $data = $richting->find($id);
        return view('pages.richtingen.edit')->with(['richting' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Richting  $richting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Richting $richting, $id)
    {
        //
        $richting->updateRichting($request->only(["richting_naam"]), $id);
        return redirect()->action([RichtingController::class, "edit"], $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Richting  $richting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Richting $richting, $id)
    {
        $richting->deleteRichting($id);
        return redirect()->action([RichtingController::class, 'index']);
    }
}
