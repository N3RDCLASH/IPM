<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opwaardering extends Model
{
    use HasFactory;
    public $fillable = ['bedrag', 'status'];
    protected $table = "opwaarderingen";

    public function createOpwaardering($data)
    {
        $this->user_id = auth()->user()->id;
        $this->bedrag = $data['bedrag'];
        $this->status = 'pending';
        $this->save();
    }
    public function getOpwaarderingenPerUser($user_id)
    {
        return $this->where('opwaarderingen.user_id', $user_id)->join('studenten', 'studenten.user_id', '=', 'opwaarderingen.user_id')->get();
    }
    public function getAllOpwaarderingen()
    {
        return $this->select('opwaarderingen.*', 'studenten.voor_naam', 'studenten.achter_naam')->join('studenten', 'studenten.user_id', '=', 'opwaarderingen.user_id')->get();
    }
}
