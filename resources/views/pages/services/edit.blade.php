@extends('layouts.app', [
'class' => '',
'elementActive' => 'services'
])

@section('content')
<div class="content">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Services</h4>
            </div>
            <div class="card-body">
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
                            value="{{$service->service_naam}}" aria-describedby="naamHelp"
                            placeholder="Vul service naam in...">
                    </div>
                    <div class="form-group">
                        <label for="serviceInputBeschrijving">Service Beschrijving</label>
                        <input type="text" class="form-control" id="serviceInputBeschrijving"
                            value="{{$service->service_beschrijving}}" name="service_beschrijving"
                            aria-describedby="beschrijvingHelp" placeholder="Vul service beschrijving in...">
                    </div>
                    <div class="form-group">
                        <label for="currentfile">Huidig ​​bestand:{{$service->service_document}}</label>
                        <label for="serviceInputDocument">Service Document</label>
                        <input type="file" class="form-control-file" id="serviceInputDocument" name="service_document">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="serviceInputPrijs">Service Beschrijving</label>
                        <input type="number" class="form-control" id="serviceInputPrijs"
                            value="{{$service->service_prijs}}" name="service_prijs"
                            aria-describedby="prijsHelp" placeholder="Vul service prijs in...">
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
