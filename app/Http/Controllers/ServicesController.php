<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Student;
use Error;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use NcJoes\OfficeConverter\OfficeConverter;

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
            return ($filePath);
        }
    }

    public function downloadFile()
    {
        $user_id = request()->query('user_id');
        $service_id = request()->query('service_id');

        $student = new Student;
        $user_data = $this->formatUserData(
            $student->getFullStudentData($user_id)
        );

        $service = Service::find($service_id);
        $file = $service->service_document;

        // TBS file importing
        $TBS = new \clsTinyButStrong;
        $TBS->Plugin(TBS_INSTALL, 'clsOpenTBS');
        $TBS->LoadTemplate(public_path(Storage::url($file)));

        // Change user values in template
        foreach ($user_data as $key => $value) {
            $TBS->Source = str_replace("{{{$key}}}", $value, $TBS->Source);
        }
        // store generated document on server
        $path = "storage/uploads/tmp/{$service->service_naam}_user_$user_id.docx";
        $TBS->Show(OPENTBS_FILE, $path);

        //convert docx to pdf using libre office console command
        exec('start /wait soffice --convert-to pdf ' . public_path($path) . ' --outdir ' . public_path('storage\uploads\tmp'));
        // return download 
        $saldo_controller = new SaldoController;

        if ($saldo_controller->transactieAanmaken($user_id, $service_id))
            return  response()->download(public_path("storage/uploads/tmp/{$service->service_naam}_user_$user_id.pdf"), "{$service->service_naam}_{$user_data['naam']}_" . now() . ".pdf");

        return Log::error("Document kon niet gegenereerd worden");
    }
    protected function formatUserData($data)
    {
        setlocale(LC_TIME, 'Dutch');
        // return $data;
        return [
            "naam" => $data['voor_naam'] . ' ' . $data['achter_naam'],
            "datum" => strftime("%e %B %Y"),
            "klas" => $data['klas'],
            "richting" => $data['richting_naam'],
            "schooljaar" => $data['school_jaar'],
        ];
    }
}
