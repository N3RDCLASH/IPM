<?php 
$user = Auth::user();

$year = date('Y');
use App\Http\Controllers\StudentKlasController;
?>

@extends('layouts.app', [
'class' => '',
'elementActive' => 'klassen'
])

@section('content')
<div class="content">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Klas</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>

                            @foreach ($klas->getOriginal() as $key => $value)
                            <tr>
                                <td><b>{{$key}}</b></td>
                                <td>{{$value}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Klas Formatie</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th></th>
                        </thead>
                        @if($studenten !=="")
                        <tbody>

                            @foreach ($studenten as $student)
                            <tr>
                                <td><b>{{$student->voor_naam ." ".$student->achter_naam}}</b></td>
                            </tr>
                            @endforeach

                        </tbody>
                        @else
                        <tbody>
                            Geen studenten beschikbaar.
                        </tbody>
                        @endif
                    </table>
                </div>
                <form action="{{action([StudentKlasController::class,'store'])}}" method="POST">
                    <div class="row">
                        <div class="col-sm-8 align-self-center">
                            @csrf()
                            <select class="form-control basicAutoSelect" name="student_id"
                                placeholder="type to search..." data-url="http://ipm.me/api/student/all"
                                autocomplete="off"></select>
                            <input type="hidden" name="klas_id" value="{{$klas->id}}">
                            <input type="hidden" name="school_jaar" value="{{$klas->jaar}}">
                        </div>
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-warning">toevoegen</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $('.basicAutoSelect').autoComplete({
formatResult:({id,achter_naam,voor_naam})=>{
return {value:id, text:`${achter_naam} ${voor_naam}`}
},
resolverSettings: {
url: `http://${window.location.host}/api/student/all`
},
minLength:2,});
</script>
@endpush
@endsection