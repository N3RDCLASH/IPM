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
                            <th></th>
                        </thead>
                        @if(""!=="")
                        <tbody>

                            @foreach ($klas->getOriginal() as $key => $value)
                            <tr>
                                <td><b>{{$key}}</b></td>
                                <td>{{$value}}</td>
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
                <div class="row">
                    <div class="col-sm-8 align-self-center">
                        <select class="form-control basicAutoSelect" name="simple_select"
                            placeholder="type to search..." data-url="testdata/test-select-simple.json"
                            autocomplete="off"></select>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-warning">toevoegen</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $('.basicAutoSelect').autoComplete();
</script>
@endpush
@endsection