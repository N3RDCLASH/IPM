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
    $url= action([KlasController::class,'update'],$klas->id);
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
            <label for="klasInputNaam">Klas Naam</label>
            <input type="text" class="form-control" id="klasInputNaam" name="klas" value="{{$klas->klas}}"
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
                @for($i=1901; $i<=$year;$i++) @if ($klas->jaar == $i-1 ."-" . $i)
                    <option selected> {{$i-1 ."-" . $i}}</option>;
                    @else
                    <option> {{$i-1 ."-" . $i}}</option>;
                    @endif
                    @endfor
            </select>
        </div>
        
        <button type="submit" id="serviceSubmitButton" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection