@extends('layouts.app', [
'class' => '',
'elementActive' => 'cijfers'
])

@section('content')
@php
use App\Http\Controllers\CijferController;
$url = action([CijferController::class,'store'])
@endphp
{{-- {{
dd($cijfers->toArray())
}} --}}
<div class="content">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Cijfers</h4>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cijferModal"><i
                        class="nc-icon nc-simple-add"></i> Cijfer Toevoegen
                </button>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#importerenModal"><i
                        class="nc-icon nc-cloud-upload-94"></i> Cijfers Importeren
                </button>
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th></th>
                            <th>Vak</th>
                            <th>Klas</th>
                            <th>Student</th>
                            <th>Klas</th>
                            <th>Cijfer</th>
                        </thead>
                        <tbody>
                            @php
                            $i=1
                            @endphp
                            @if($cijfers!=="")
                            @foreach($cijfers as $cijfer)
                            <tr data-id="">
                                <td>@php if(isset($_GET['page'])) {echo $i++ + 10 * ($_GET['page']-1);}@endphp</td>
                                <td>{{$cijfer->vak_naam}}</td>
                                <td>{{$cijfer->klas}}</td>
                                <td>{{$cijfer->voor_naam .' '. $cijfer->achter_naam}}</td>
                                <td>{{$cijfer->cijfer}}</td>
                                <td><a href="{{action([CijferController::class,'show'],[$cijfer])}}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                                <td><a href="{{action([CijferController::class,'edit'],[$cijfer])}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{action([CijferController::class,'destroy'],[$cijfer])}}"
                                        id="delete_form_{{$cijfer->id}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a onclick="confirmDelete({{$cijfer->id}})">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td>
                                    Geen Cijfers beschikbaar
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div class="justify-content-center d-flex">

                    {{ $cijfers->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="cijferModal" tabindex="-1" role="dialog" aria-labelledby="cijferModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cijferModalLabel">Klas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
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
                            <label for="cijferInputNaam">Klas Naam</label>
                            <input type="text" class="form-control" id="cijferInputNaam" name="cijfer"
                                aria-describedby="naamHelp" placeholder="Vul cijfer naam in...">
                        </div>
                        <button type="submit" id="cijferSubmitButton" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="importerenModal" tabindex="-2" role="dialog" aria-labelledby="importerenModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cijferModalLabel">Cijferlijst</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{$url}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="cijferlijst" accept=".csv" id="">
                        <input type="hidden" name="import" value="true" id="">
                        <button type="submit" id="cijferSubmitButton" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection