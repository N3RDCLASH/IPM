@extends('layouts.app', [
'class' => '',
'elementActive' => 'richtingen'
])

@section('content')
<div class="content">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Vak</h4>
            </div>
            <div class="card-body">
                <?php
                    use App\Http\Controllers\VakController;
                    $url= action([VakController::class,'update'],[$vak]);
                    // $url= "";
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
                        <label for="vakInputNaam">Vak Naam</label>
                        <input type="text" class="form-control" id="vakInputNaam" name="vak_naam"
                            value="{{$vak->vak_naam}}" aria-describedby="naamHelp" placeholder="Vul vak naam in...">
                    </div>
                    <button type="submit" id="serviceSubmitButton" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    @endsection

    @push('scripts')
    <script>

    </script>
    @endpush