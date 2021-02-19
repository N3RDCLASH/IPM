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
    ];

    public function createService($data)
    {
        // dd($data);
        $this::create([
            "service_naam" => $data['service_naam'],
            "service_beschrijving" => $data['service_beschrijving'],
            "service_document" => $data['service_document'],
        ]);
    }

    public function getOneService($id)
    {
        return $this::select()->where('service_id', $id)->get();
    }
    public function updateService($data, $id)
    {
        return $this::where('service_id', $id)->update(['service_naam' => $data['service_naam']]);
    }
    public function deleteService($id)
    {
        return $this::where('service_id', $id)->delete();
    }
}
