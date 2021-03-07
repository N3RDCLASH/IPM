<?php
$user = Auth::user();

$year = date('Y');
?>

@extends('layouts.app', [
'class' => '',
'elementActive' => 'services'
])

@section('content')
<div class="content">
    <?php
    use App\Http\Controllers\ServicesController;
    $url= action([ServicesController::class,'update'],$service->id);
?>
    <form action="{{$url}}" method="POST">
        @csrf()
        @method('PUT')

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
            <label for="serviceInputNaam">Service Naam</label>
            <input type="text" class="form-control" id="serviceInputNaam" name="service_naam"
                aria-describedby="naamHelp" placeholder="Vul service naam in...">
        </div>
        <div class="form-group">
            <label for="serviceInputBeschrijving">Service Beschrijving</label>
            <input type="text" class="form-control" id="serviceInputBeschrijving"
                name="service_beschrijving" aria-describedby="beschrijvingHelp"
                placeholder="Vul service beschrijving in...">
        </div>
        <div class="form-group">
            <label for="serviceInputDocument">Service Document</label>
            <input type="file" class="form-control-file" id="serviceInputDocument" name="service_document">
        </div>

        <button type="submit" id="serviceSubmitButton" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
