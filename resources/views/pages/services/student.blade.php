<div class="service-items">

    @foreach ($services as $service )
    <div class="col-md-3">

        <div class="card card-user card-stats">
            <div class="card-body ">
                <div class="row pt-4">
                    <div class="col-md-12 col-sm-12">
                        <div class="icon-huge text-center icon-warning">
                            <i class="nc-icon nc-book-bookmark text-success"></i>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class=" col-md-12">
                        <div class="numbers">
                            <p class="card-title text-center">{{$service->service_naam}}</p>
                            <p class="card-category text-center">SRD {{$service->service_prijs}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-footer ">
                <div class="button-container">
                    <div class="row">
                        <div class="col-lg-12 mr-auto">
                            <a href="#" id="downloadStudentenKaart" onclick=" ">
                                <h5> <i class="nc-icon nc-cloud-download-93"></i>
                                    <br>
                                    <small>{{ __('Download') }}</small>
                                </h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>