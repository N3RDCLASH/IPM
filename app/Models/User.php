<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_naam',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function createAdmin($data)
    {
        $this->user_naam = $data['username']; // will see
        $this->password = Hash::make($data["password"]);
        $this->save();
    }

    public function createStudent($data)
    {
        $user = new User();
        $user->user_naam = $data['Vname'] . request('Aname'); // will see
        $user->password = Hash::make('lol');
        $user->pincode =  $data['pin'];
        $user->QRpassword = Hash::make($data['Vname'] . $data['pin']);
        $user->email = $data['email'];
        $user->save();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'text'])
            ->logOnlyDirty();
    }

    // public function routeNotificationForMail($notifiation)
    // {
    //     $student = new Student();
    //     $student::where('user_id', auth()->user()->id)->first();
    //     // Return email address only...
    //     return $student->email;

    //     // Return email address and name...
    //     return dd([$student->email => $student->voor_naam . " " . $student->achter_naam]);
    // }
}
