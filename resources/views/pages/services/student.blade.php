<?php
use App\Http\Controllers\ServicesController;
?>

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
                            <form id="service_download_{{$service->id}}"
                                action="{{action([ServicesController::class,'downloadFile'],['user_id'=>auth()->user()->id,'service_id'=>$service->id])}}"
                                method="post">
                                @csrf
                                <a href="#" class="downloadService" data-id="{{$service->id}}">
                                    <h5> <i class="nc-icon nc-cloud-download-93"></i>
                                        <br>
                                        <small>{{ __('Download') }}</small>
                                    </h5>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded',()=>{
    let elements = document.querySelectorAll(".downloadService")

        for(let el of elements){
        el.addEventListener('click',()=>confirmTransactie(el.dataset.id))
        }

    function confirmTransactie(id){
        console.log(id)
    Swal.fire({
    title: 'Bent U zeker dat U wilt dit document wilt kopen?',
    showDenyButton: true,
    confirmButtonText: `Ja`,
    denyButtonText: `Nee`,
    customClass: {
    confirmButton: 'btn btn-success',
    denyButton: 'btn btn-danger'
    },
    }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
    Swal.fire('Uw opwaarderingen is aangemaakt!', '', 'success')
    document.getElementById(`service_download_${id}`).submit()
    } else if (result.isDenied) {
    Swal.fire('Uw opwaarderingen is niet aangemaakt!', '', 'error')
    }
    })
    
    }
    })
</script>
@endpush