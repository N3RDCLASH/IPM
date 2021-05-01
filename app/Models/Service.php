<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_naam',
        'service_beschrijving',
        'service_document',
        'service_prijs'
    ];

    public function createService($data)
    {
        // dd($data);
        $this::create([
            "service_naam" => $data['service_naam'],
            "service_beschrijving" => $data['service_beschrijving'],
            "service_document" => $data['service_document'],
            "service_prijs" => $data['service_prijs']
        ]);
    }

    public function getOneService($id)
    {
        return $this::select()->where('service_id', $id)->get();
    }

    public function updateService($data, $id)
    {
        // return $this::where('service_id', $id)->update(['service_naam' => $data['service_naam']]);
        $service = $this->find($id);
        $service->service_naam = $data['service_naam'];
        $service->service_beschrijving = $data['service_beschrijving'];
        $service->service_document = $data['service_document'];
        $service->service_prijs = $data['service_prijs'];
        $service->save();
    }

    public function deleteService($id)
    {
        // return $this::where('service_id', $id)->delete();
        $service = $this->find($id);
        $service->delete();
    }
}
