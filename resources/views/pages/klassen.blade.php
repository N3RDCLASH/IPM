<?php 
$user = Auth::user();

$year = date('Y');
?>

@extends('layouts.app', [
'class' => '',
'elementActive' => 'klassen'
])

@section('content')
<div class="content">
    <?php
    use App\Http\Controllers\KlasController;
    $url= action([KlasController::class,'store']);
?>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Klassen</h4>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#klasModal"><i
                        class="nc-icon nc-simple-add"></i> klas
                    Toevoegen</button>
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>Klas</th>
                            <th>Richting</th>
                            <th>Jaar</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @if($klassen!=="")
                            @foreach($klassen as $klas)
                            <tr data-id="">
                                <td>{{$klas->klas}}</td>
                                <td>{{$klas->richting_id}}</td>
                                <td>{{$klas->jaar}}</td>
                                <td><a href="{{action([KlasController::class,'show'],[$klas])}}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                                <td><a href="{{action([KlasController::class,'edit'],[$klas])}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{action([KlasController::class,'destroy'],[$klas])}}"
                                        id="delete_form_{{$klas->id}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a onclick="confirmDelete({{$klas->id}})">
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
    <div class="modal fade" id="klasModal" tabindex="-1" role="dialog" aria-labelledby="klasModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="klasModalLabel">Klas</h5>
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
                            <label for="klasInputNaam">Klas Naam</label>
                            <input type="text" class="form-control" id="klasInputNaam" name="klas"
                                aria-describedby="naamHelp" placeholder="Vul klas naam in...">
                        </div>
                        <div class="form-group">
                            <label for="klasInputRichting">Klas Richting</label>
                            <select class="form-control" id="klasInputRichting" name="richting_id">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="klasInputRichting">Klas SchoolJaar</label>
                            <select class="form-control" id="klasInputRichting" name="jaar">
                                @for($i=1901; $i<=$year;$i++) <option selected> {{$i-1 ."-" . $i}}</option>; @endfor
                            </select>
                        </div>


                        <button type="submit" id="serviceSubmitButton" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>

</script>
@endpush