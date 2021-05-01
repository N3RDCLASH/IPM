<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Student;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Storage;

require(app_path() . '\..\vendor\tinybutstrong\tinybutstrong\tbs_class.php');
require(app_path() . '\..\vendor\tinybutstrong\opentbs\tbs_plugin_opentbs.php');

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
        $service->createService(["service_naam" => $request->service_naam, "service_beschrijving" => $request->service_beschrijving, 'service_document' => $this->fileUpload($request), 'service_prijs' => $request->service_prijs]);
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

    public function update(Request $request, Service $service)
    {
        $service->updateService($request->only(["service_naam", "service_beschrijving", "service_document", "service_prijs"]), $service->id);
        return redirect()->action([ServicesController::class, "edit"], $service->id);
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

    public function fileUpload(Request $req)
    {

        if ($req->file()) {
            $fileName = time() . '_' . $req->file('service_document')->getClientOriginalName();
            $filePath = $req->file('service_document')->storeAs('uploads', $fileName, 'public');

            // returns storage path
            return ('/storage/' . $filePath);
        }
    }

    public function downloadFile($user_id, $service_id)
    {
        $user_data = Student::where('user_id', $user_id)->first()->toArray();
        // $file = Service::find($service_id)->service_document;
        dd($user_data);

        // $TBS = new \clsTinyButStrong;
        // $TBS->Plugin(TBS_INSTALL, 'clsOpenTBS');
        // $TBS->LoadTemplate(public_path(Storage::url($file)));
        // // dd(public_path(Storage::url('public' . $file)));
        // foreach ($user_data as $key => $value) {
        //     $TBS->Source = str_replace("{{{$key}}}", $value, $TBS->Source);
        // }
        // $TBS->Show(OPENTBS_DOWNLOAD);
    }
}
