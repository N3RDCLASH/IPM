<?php
use App\Http\Controllers\UserController;
$url = action([UserController::class, 'storeUser']);
?>




<div class="container table-responsive py-5">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Administratie</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#adminModal"><i
                            class="nc-icon nc-simple-add"></i> Admin
                        Toevoegen</button>



                    <tr>
                        <th scope="row">Beheerders</th>
                    </tr>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User</th>
                        {{-- <th scope="col">Password</th> --}}
                        <th scope="col">Created</th>
                        <th scope="col">DELETE</th>
                        <th scope="col">Update</th>
                        <th scope="col">View</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    @if ($user->hasRole('admin'))
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->user_naam }}</td>
                        {{-- <td>{{ $user->password }}</td> --}}
                        <td>{{ $user->created_at }}</td>
                        <td><a class="btn btn-danger" href="user/Delete/{{ $user->id }}">Delete</a></td>
                        <td><a class="btn btn-success" href="user/Update/{{ $user->id }}">Update</a></td>
                        <td><a class="btn btn-primary" href="user/view/{{ $user->id }}">View</a></td>
                        @csrf
                        @method('DELETE')
                    </tr>
                    @endif
                    @endforeach
                </tbody>


            </table>
        </div>
    </div>
</div>

{{-- <!-- Modal -->
<div class="modal fade" id="adminModal" tabindex="-1" role="dialog" aria-labelledby="adminModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="adminModalLabel">admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ $url }}" method="POST">
@csrf()
<h2>Add admin</h2>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="first">User Name</label>
            <input type="text" class="form-control" placeholder="" name="username" id="first">
        </div>
    </div>
    <!--  col-md-6   -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="last">Password
                </label>
                <div class="row">
                    <input type="text" class="form-control" placeholder="" name="password" id="last">
                </div>
            </div>
            <button type="submit" id="serviceSubmitButton" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div> --}}