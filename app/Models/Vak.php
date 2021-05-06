<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vak extends Model
{
    use HasFactory;
    protected $table = "";
    protected $fillable = [
        "vak_naam"
    ];

    protected function createVak($data)
    {
        return $this->create([
            "vak_naam" => $data["vak_naam"]
        ]);
    }
    protected function updateVak($data)
    {
        return $this->update([
            "vak_naam" => $data["vak_naam"]
        ]);
    }
    protected function deleteVak($id)
    {
        return $this->find($id)->delete();
    }
}
