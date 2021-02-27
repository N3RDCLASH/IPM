<?php 
$user = Auth::user();
?>

@extends('layouts.app', [
'class' => '',
'elementActive' => 'richtingen'
])

@section('content')
<div class="content">
    <?php
    use App\Http\Controllers\RichtingController;
    $url= action([RichtingController::class,'store']);
?>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Richting</h4>
            </div>
            <div class="card-body">
             <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
            
                        @foreach ($richting->getOriginal() as $key => $value)
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
    @endsection

    @push('scripts')
    <script>

    </script>
    @endpush