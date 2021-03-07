<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Facade\FlareClient\Stacktrace\File;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::All();
        return view('pages.services')->with(['services' => $services]);
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
        // dd($request);
        $service = new Service();
        $service->create(["service_naam" => $request->service_naam, "service_beschrijving" => $request->service_beschrijving, 'service_document' => $this->fileUpload($request)]);
        return redirect(route('services'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('pages.services.service')->with(['service' => $service]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('pages.services.edit')->with(['service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Service $service, $id)
    {
        $service->updateService($request->only(["service_naam", "service_beschrijving", "service_document"]),$service->$id);
        return redirect()->action([ServicesController::class, "edit"], $service->$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function destroy(Service $service, $id)
    // {
    //     $service ->deleteService($id);
    //     return redirect()->action([ServicesController::class, 'index']);
    // }

    public function destroy(Service $service, $id)
    {
        $service->deleteService($id);
        return redirect()->action([ServicesController::class, 'index']);
        // return view('pages.services.service')->with(['service' => $service]);
    }

    // public function destroy(Richting $richting, $id)
    // {
    //     $richting->deleteRichting($id);
    //     return redirect()->action([RichtingController::class, 'index']);
    // }

    public function fileUpload(Request $req)
    {

        if ($req->file()) {
            $fileName = time() . '_' . $req->file('service_document')->getClientOriginalName();
            $filePath = $req->file('service_document')->storeAs('uploads', $fileName, 'public');

            // returns storage path
            return ('/storage/' . $filePath);
        }
    }
}
