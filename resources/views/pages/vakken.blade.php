@extends('layouts.app', [
'class' => '',
'elementActive' => 'vakken'
])

@section('content')
<div class="content">
    <?php
    use App\Http\Controllers\VakController;
    $url= action([VakController::class,'store']);
?>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Klassen</h4>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#vakModal"><i
                        class="nc-icon nc-simple-add"></i> vak
                    Toevoegen</button>
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>Klas</th>
                        </thead>
                        <tbody>
                            @if($vakken!=="")
                            @foreach($vakken as $vak)
                            <tr data-id="">
                                <td>{{$vak->vak_naam}}</td>
                                <td>{{$vak->jaar}}</td>
                                <td><a href="{{action([VakController::class,'show'],[$vak])}}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                                <td><a href="{{action([VakController::class,'edit'],[$vak])}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{action([VakController::class,'destroy'],[$vak])}}"
                                        id="delete_form_{{$vak->id}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a onclick="confirmDelete({{$vak->id}})">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td>
                                    Geen Klassen beschikbaar
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="vakModal" tabindex="-1" role="dialog" aria-labelledby="vakModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="vakModalLabel">Klas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{$url}}" method="POST">
                        @csrf()

                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="vakInputNaam">Klas Naam</label>
                            <input type="text" class="form-control" id="vakInputNaam" name="vak"
                                aria-describedby="naamHelp" placeholder="Vul vak naam in...">
                        </div>
                        <button type="submit" id="vakSubmitButton" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection