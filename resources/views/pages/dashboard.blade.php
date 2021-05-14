@extends('layouts.app', [
'class' => '',
'elementActive' => 'dashboard'
])

@section('content')
<div class="content">


    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-title">Activity Log</h5>
                    <p class="card-category">Line Chart with Points</p>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th></th>
                            <th>User</th>
                            <th>Activity</th>
                            <th>Date</th>
                        </thead>
                        <tbody>
                            <?php $x=true; ?>
                            @for ($i=1;$i<5;$i++) <tr>
                                <?php$x=!$x;?>
                                <td>{{$i}}</td>
                                <td>Joel Naarendorp</td>
                                <td>{{!$x?'login':'logout'}}</td>
                                <td>{{ now()->add(new DateInterval('PT' . 5 . 'M')) }}</td>
                                </tr>
                                @endfor
                        </tbody>
                    </table>

                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
        });
</script>
@endpush