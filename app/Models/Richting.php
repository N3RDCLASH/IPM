<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Richting extends Model
{
    use HasFactory;
    protected $table = "richtingen";
    public $timestamps = false;

    protected $fillable = [
        'richting_naam',
    ];

    public function createRichting($data)
    {
        $this->richting_naam = $data['richting_naam'];
        $this->save();
    }

    public function updateRichting($data, $id)
    {
        $richting = $this->find($id);
        $richting->richting_naam = $data['richting_naam'];
        $richting->save();
    }


    public function deleteRichting($id)
    {
        $richting = $this->find($id);
        $richting->delete();
    }
}
