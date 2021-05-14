<?php

namespace App\Http\Controllers;

use App\Models\Cijfer;
use Illuminate\Http\Request;

class CijferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cijfer = new Cijfer;
        // $klassen = array_unique(array_map(fn ($x) => $x['klas'], $cijfer->getCijfers()->toArray()));
        // $vakken = array_unique(array_map(fn ($x) => $x['vak_naam'], $cijfer->getCijfers()->toArray()));
        // $periode = array_unique(array_map(fn ($x) => $x['periode'], $cijfer->getCijfers()->toArray()));
        return view('pages.cijfers')->with(["cijfers" => $cijfer->getCijfers()]);
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
        $cijfer = new Cijfer;
        // dd([isset($request->import), $request->file('cijferlijst') !== null]);
        if (isset($request->import) && $request->file('cijferlijst') !== null) {
            $data = $this->importCSV($request->file('cijferlijst'));
            if (
                $data[0][0] == "id"  &&
                $data[0][1] == "vak_id" &&
                $data[0][2] == "studentklas_id" &&
                $data[0][3] == "periode" &&
                $data[0][4] == "cijfer"
            ) {

                foreach ($data as $row) {
                    if (is_numeric($row[0]))
                        $cijfer->createCijfer($row);
                }
                return redirect(route('cijfers'));
            }
        }
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function importCSV($file)
    {
        $data = [];
        $file = fopen($file, 'r');
        while ($row = fgetcsv($file)) {
            array_push($data, $row);
        };
        return $data;
    }
}
