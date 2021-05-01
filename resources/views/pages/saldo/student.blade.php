<?php 

use App\Http\Controller\SaldoControlller;
?>

<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-money-coins text-success"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">Saldo</p>
                            <p class="card-title">SRD {{$saldo}}<p>
                        </div>
                    </div>
                </div>
                <div class="card-footer card-user">
                    <hr>
                    <div class="button-container">
                        <div class="row">
                            <div class="col-lg-12 mr-auto">
                                <a href="#" data-toggle="modal" data-target="#saldoModal">
                                    <h5>
                                        <i class="fa fa-plus"></i>
                                        <br>
                                        <small>{{ __('Opwaarderen') }}</small>
                                    </h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-title">Transacties</h5>
                    <p class="card-category">Lijn Diagram met transactie data</p>
                </div>
                <div class="card-body">
                    <canvas id="speedChart" width="400" height="100"></canvas>
                </div>
                <div class="card-footer">
                    <div class="chart-legend">
                        <i class="fa fa-circle text-success"></i> Opwaarderingen
                        <i class="fa fa-circle text-danger"></i> Aankoop
                    </div>
                    <hr />
                    <div class="card-stats">
                        {{-- <i class="fa fa-check"></i> Data information certified --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Opwaardering</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>
                                Datum
                            </th>
                            <th>
                                Status
                            </th>
                            <th class="text-right">
                                Bedrag
                            </th>
                            <th></th>
                        </thead>
                        <tbody>
                            {{-- {{dd($opwaardering)}} --}}
                            @if (count($opwaarderingen) !== 0)
                            @foreach ($opwaarderingen as $opwaardering)
                            <tr>
                                <td>{{$opwaardering->created_at}}</td>
                                <td>{{$opwaardering->status}}</td>
                                <td class="text-right text-bold"> SRD {{$opwaardering->bedrag}}</td>
                                @if ($opwaardering->status == "pending")
                                <td><button class="btn btn-sm btn-danger">cancel</button></td>
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
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Transacties</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>
                                Service
                            </th>
                            <th>
                                Datum
                            </th>
                            <th class="text-right">
                                Bedrag
                            </th>
                        </thead>
                        <tbody>
                            {{-- {{dd($transacties)}} --}}
                            @if (count($transacties) !== 0)
                            @foreach ($transacties as $transactie)
                            <tr>
                                <td>{{$transactie->service_naam}}</td>
                                <td>{{$transactie->transactie_datum}}</td>
                                <td class="text-right">SRD {{$transactie->service_prijs}}</td>
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
        </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="saldoModal" tabindex="-1" role="dialog" aria-labelledby="saldoModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="saldoModalLabel">Saldo Opwaarderen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('opwaarderen')}}" method="POST" id="opwaardeerForm">
                    @csrf
                    <div class="form-group">
                        <label for="bedrag">Bedrag</label>
                        <input type="number" class="form-control" id="bedrag" placeholder="Vul het bedrag in..."
                            name="bedrag" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
{{-- {{dd($transacties->toJSON())}} --}}
@push('scripts')
<script>
    $(document).ready(function() {
        document.getElementById('opwaardeerForm').addEventListener('submit',(e)=>{
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



            
            
        });
        var speedCanvas = document.getElementById("speedChart");
        
        var dataFirst = {
        data: {{json_encode(array_map(fn($x)=>$x['bedrag'],$opwaarderingen->toArray()))}},
        fill: false,
        borderColor: '#6bd098',
        backgroundColor: 'transparent',
        pointBorderColor: '#6bd098',
        pointRadius: 4,
        pointHoverRadius: 4,
        pointBorderWidth: 8,
        };
        
        var dataSecond = {
        data: {{json_encode(array_map(fn($x)=>$x['service_prijs'],$transacties->toArray()))}},
        fill: false,
        borderColor: '#ef8157',
        backgroundColor: 'transparent',
        pointBorderColor: '#ef8157',
        pointRadius: 4,
        pointHoverRadius: 4,
        pointBorderWidth: 8
        };
        
        var speedData = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [dataFirst, dataSecond]
        };
        
        var chartOptions = {
        legend: {
        display: false,
        position: 'top'
        }
        };
        
        new Chart(speedCanvas, {
        type: 'line',
        hover: false,
        data: speedData,
        options: chartOptions
        });
        });
</script>
@endpush