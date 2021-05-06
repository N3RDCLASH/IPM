<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cijfer extends Model
{
    use HasFactory;
    protected $fillable = [];
    protected $table = "cijfers";

    protected function createCijfer($data)
    {
        return $this->create([
            "cijfer" => $data["cijfer"]
        ]);
    }
    protected function updateCijfer($data)
    {
        return $this->update([
            "cijfer" => $data["cijfer"]
        ]);
    }
    protected function deleteCijfer($id)
    {
        return $this->find($id)->delete();
    }
}
