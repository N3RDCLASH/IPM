<?php 

use App\Http\Controller\SaldoController;
// action([SaldoController::class,"opwaarderingAfkeuren"],[]);
?>

<div class="col-md-8 text-center">

    <div class="card">
        <div class="card-header">
            <h4 class="card-title text-left">{{ __('Aanvragen') }}</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class="text-primary">
                        <tr>
                            <th>Student</th>
                            <th>Datum</th>
                            <th>Status</th>
                            <th>Bedrag</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- {{dd($opwaarderingen)}} --}}
                        @if (count($opwaarderingen) !== 0)
                        @foreach ($opwaarderingen as $opwaardering)
                        <tr>
                            <td>{{$opwaardering->voor_naam ." ". $opwaardering->achter_naam}}</td>
                            <td>{{$opwaardering->created_at}}</td>
                            <td>{{$opwaardering->status}}</td>
                            <td class="text-right text-bold"> SRD {{$opwaardering->bedrag}}</td>
                            @if ($opwaardering->status == "pending")
                            <td>
                                <div class="d-flex justify-content-around">
                                    <form id="opwaardering_accept_{{$opwaardering->id}}"
                                        action="{{route('opwaardering.accept',["opwaardering_id"=>$opwaardering->id])}}"
                                        method="post">
                                        @csrf
                                        <button class="btn btn-sm btn-success">accepteren</button>
                                    </form>
                                    <form id="opwaardering_decline_{{$opwaardering->id}}"
                                        action="{{route('opwaardering.decline',["opwaardering_id"=>$opwaardering->id])}}"
                                        method="post">
                                        @csrf
                                        <button class="btn btn-sm btn-danger">afkeuren</button>
                                    </form>
                                </div>
                            </td>
                            @endif
                        </tr>
                        @endforeach

                        @else
                        <tr>
                            <td colspan="4">
                                Er zijn geen transacties beschikbaar
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
        </div>
    </div>
</div>
@push('scripts')
<script>
    const confirmTransactie=(e)=>{
    e.preventDefault()
    Swal.fire({
    title: 'Bent U zeker dat U wilt opwaarderen?',
    showDenyButton: true,
    confirmButtonText: `Ja`,
    denyButtonText: `Nee`,
    }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
    Swal.fire('Uw opwaarderingen is aangemaakt!', '', 'success')
    document.getElementById('opwaardeerForm').submit()
    } else if (result.isDenied) {
    Swal.fire('Uw opwaarderingen is niet aangemaakt!', '', 'error')
    }
    })
    
    }
    $('.basicAutoSelect').autoComplete({
formatResult:({id,achter_naam,voor_naam})=>{
return {value:id, text:`${voor_naam} ${achter_naam}`}
},
resolverSettings: {
url: 'http://ipm.me/api/student/all'
},
minLength:2,});
</script>
@endpush