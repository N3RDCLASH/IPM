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
    public function getAllOpwaarderingen($user_id)
    {
        return $this->where('user_id', $user_id)->get();
    }
}
