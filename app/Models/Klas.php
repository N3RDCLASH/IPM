<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klas extends Model
{
    use HasFactory;
    protected $table = 'klassen';
    protected $fillable = ["klas,richting_id,jaar"];

    public function createKlas($data)
    {
        $this->klas = $data['klas'];
        $this->richting_id = $data['richting_id'];
        $this->jaar = $data['jaar'];
        $this->save();
    }

    public function updateKlas($data, $id)
    {
        $klas = $this->find($id);
        $klas->klas = $data['klas'];
        $klas->richting_id = $data['richting_id'];
        $klas->jaar = $data['jaar'];
        $klas->save();
    }

    public function deleteKlas($id)
    {
        $klas = $this->find($id);
        $klas->delete();
    }
}
