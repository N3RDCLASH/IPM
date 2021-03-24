<div class="col-md-8 text-center" >
    <form class="col-md-12" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="customSwitch1">
            <label class="custom-control-label" for="customSwitch1">Toggle this switch element</label>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ __('Edit Profile') }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <label class="col-md-3 col-form-label">{{ __('User') }}</label>
                    <div class="col-md-9">
                        <div class="form-group">
                            <select class="form-control basicAutoSelect" name="student_id"
                                placeholder="type to search..." data-url="http://ipm.me/api/student/all"
                                autocomplete="off"></select>
                        </div>
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-3 col-form-label">{{ __('Saldo') }}</label>
                    <div class="col-md-9">
                        <div class="form-group">
                            <input type="num" class="form-control" id="" value="{{__('')}}" placeholder="Saldo"
                                name="saldo">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-info btn-round">{{ __('Save Changes') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
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