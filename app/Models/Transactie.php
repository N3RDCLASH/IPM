<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactie extends Model
{
    use HasFactory;

    public $dates = [];
    public $fillable = [
        'user_id',
        'service_id',
    ];

    public function createTransactie(int $user_id, $service_id)
    {
        return $this->create([
            "user_id" => $user_id,
            "service_id" => $service_id,
        ]);
    }
    public function getTransactiesPerUser($user_id)
    {
        // dd($user_id);
        return $this->where("user_id", $user_id)->join('services', 'services.id', '=', 'transacties.service_id')->get();
    }
}
