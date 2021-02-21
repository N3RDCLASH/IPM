<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $user = User::all();
        $studenten = Student::all();
        return view('pages.users', ['studenten' => $studenten], ['users' => $user]);
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/Users')->with('mssg', 'Record has been deleted succesfully');
    }


    public function destroyStudent($id)
    {

        $student = Student::findOrFail($id);
        $student->delete();

        return redirect('/Users')->with('mssg', 'Record has been deleted succesfully'); //moet nog in de user table geplaatst worden
    }

    public function showStudent($id)
    {

        $studentgegevens = Student::findOrFail($id);

        return view('St_details', ['student' => $studentgegevens]);
    }



    public function showid($id)
    {
        $usergegevens = User::findOrFail($id);

        return view('Us_details', ['Userid' => $usergegevens]);
    }

    public function updatest($id)
    {
        $student = Student::findOrFail($id);

        return view('Updatest', ['Updateidst' => $student]);
    }

    // go to update
    public function updateus($id)
    {
        $usergegevens = User::findOrFail($id);

        return view('updateus', ['Updateid' => $usergegevens]);
    }
    //save update
    public function update_st(Request $req)
    {
        $student = new Student();
        $student->UpdateStudent($req);
        return redirect('/Users')->with('mssg', 'Record has been Updated succesfully');
    }

    //save update user
    public function update_us(Request $req)
    {
        $user = User::findOrFail($req->id);
        $user->user_naam = $req->user;
        $user->password = $req->pass;
        $user->save();

        return redirect('/Users')->with('mssg', 'Record has been Updated succesfully');
    }



    //save it first
    public function storeStudent()
    {
        $user = new User();
        $user->createStudent(request()->only(["Vname","Aname","password"]));

    
        $student = new Student();
        $student->CreateStudent($user->id);
        return $this->index;
    }

    //save
    public function saveSt()
    {

        return view('Student');
    }


    // save user
    public function storeUser()
    {
     
        $user = new User();
        $user->createAdmin(request()->only(["username","password"]));
        $user->save();

         return redirect('/users')->with('mssg', 'Record has been Created succesfully');
    }
}
