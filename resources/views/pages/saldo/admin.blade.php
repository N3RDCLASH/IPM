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
                            <th>Datum</th>
                            <th>Status</th>
                            <th>Bedrag</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

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