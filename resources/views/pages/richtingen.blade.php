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
                <h4 class="card-title"> Richtingen</h4>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#richtingModal"><i
                        class="nc-icon nc-simple-add"></i> richting
                    Toevoegen</button>
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>id</th>
                            <th>richting</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @if($richtingen!=="")
                            @foreach($richtingen as $richting)
                            <tr data-id="">
                                <td>{{$richting->id}}</td>
                                <td>{{$richting->richting_naam}}</td>
                                <td><a href="{{action([richtingController::class,'show'],[$richting])}}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                                <td><a href="{{action([richtingController::class,'edit'],[$richting])}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{action([richtingController::class,'destroy'],[$richting])}}"
                                        id="delete_form_{{$richting->id}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a onclick="confirmDelete({{$richting->id}})">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td>
                                    Geen richtingen beschikbaar
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
    <div class="modal fade" id="richtingModal" tabindex="-1" role="dialog" aria-labelledby="richtingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="richtingModalLabel">richting</h5>
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
                            <label for="richtingInputNaam">Richting Naam</label>
                            <input type="text" class="form-control" id="richtingInputNaam" name="richting_naam"
                                aria-describedby="naamHelp" placeholder="Vul richting naam in...">
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