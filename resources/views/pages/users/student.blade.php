<?php
use App\Http\Controllers\UserController;
$url = action([UserController::class, 'storeStudent']);
?>

<div class="container table-responsive py-5">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Studenten</h4>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#studentModal"><i
                    class="nc-icon nc-simple-add"></i> student
                Toevoegen</button>

            <table class="table table-bordered table-hover">
                <thead class="thead-dark">

                    <tr>
                        <th scope="row">Studenten</th>
                    </tr>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Voornaam</th>
                        <th scope="col">Achternaam</th>
                        <th scope="col">Saldo</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Update</th>
                        <th scope="col">View</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($studenten as $Student)
                        <tr>
                            <th scope="row">{{ $Student->id }}</th>
                            <td>{{ $Student->voor_naam }}</td>
                            <td>{{ $Student->achter_naam }}</td>
                            <td>{{ $Student->saldo }}</td>
                            <td><a class="btn btn-danger" href="Student/Delete/{{ $Student->id }}">Delete</a></td>
                            <td><a class="btn btn-success" href="Student/Update/{{ $Student->id }}">Update</a></td>
                            <td><a class="btn btn-primary" href="/Student/view/{{ $Student->id }}">View</a></td>

                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="studentModalLabel">student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ $url }}" method="POST">
                    @csrf()
                    <h2>Add Student</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first">Voor Naam</label>
                                <input type="text" class="form-control" name="Vname" placeholder="" id="">
                            </div>
                        </div>
                        <!--  col-md-6   -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last">Achter Naam</label>
                                <input type="text" class="form-control" name="Aname" placeholder="" id="">
                            </div>
                        </div>
                        <!--  col-md-6   -->
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Geboorte datum</label>
                                <input type="date" class="form-control" placeholder="" name="Geboorte" id="">
                            </div>


                        </div>
                        <!--  col-md-6   -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Geboorte Plaats</label>
                                <input type="text" class="form-control" id="" placeholder=" " name="Plaats">
                            </div>
                        </div>

                        <!--  col-md-6   -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Uitgave Datum</label>
                                <input type="date" class="form-control" id="" placeholder="" name="Uitgave">
                            </div>
                        </div>
                        <!--  col-md-6   -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Verval Datum</label>
                                <input type="date" class="form-control" id="" placeholder="" name="Verval">
                            </div>
                        </div>
                        <!--  col-md-6   -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Saldo</label>
                                <input type="num" class="form-control" id="" placeholder="" name="Saldo">
                            </div>
                        </div>
                        <button type="submit" id="serviceSubmitButton" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


