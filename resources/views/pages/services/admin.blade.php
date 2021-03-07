<?php
    use App\Http\Controllers\ServicesController;
    $url= action([ServicesController::class,'store']);
?>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Services</h4>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#serviceModal"><i
                    class="nc-icon nc-simple-add"></i> Service
                Toevoegen</button>
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>Naam</th>
                        <th>Beschrijving</th>
                        <th>Document</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @if($services!=="")
                        @foreach($services as $service)
                        <tr data-id="">
                            <td>{{$service->service_naam}}</td>
                            <td>{{$service->service_beschrijving}}</td>
                            <td>{{$service->service_document}}</td>
                            <td>
                                <a href="{{action([ServicesController::class,'show'],[$service])}}">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                            <td><a href="{{action([ServicesController::class,'edit'],[$service])}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{action([ServicesController::class,'destroy'],[$service])}}"
                                    id="delete_form_{{$service->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a onclick="confirmDelete({{$service->id}})">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td>
                                Geen kandidaten beschikbaar
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
<div class="modal fade" id="serviceModal" tabindex="-1" role="dialog" aria-labelledby="serviceModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="serviceModalLabel">Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{$url}}" method="POST" enctype="multipart/form-data">
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
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
        </div>
    </div>
</div>
