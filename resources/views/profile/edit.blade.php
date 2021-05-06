@extends('layouts.app', [
'class' => '',
'elementActive' => 'profile'
])
<?php
$user = Auth::user();
$isStudent = $user->hasRole('student');
?>

@section('content')
<div class="content">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    @if (session('password_status'))
    <div class="alert alert-success" role="alert">
        {{ session('password_status') }}
    </div>
    @endif
    <div class="row">
        <div class="col-md-4">
            <div class="card card-user" id="{{$isStudent ?"studentenkaart":"adminkaart"}}">
                @if($isStudent)
                <div class="card-body" style="background:white">
                    <div class="qrcode" style="background:white">
                        <table style="background:white; width:100%">
                            <tr>
                                <td>
                                    <div id="placeHolder"></div>
                                </td>
                            </tr>
                        </table>
                        <div class="">
                            <table class="col" style="background:white">
                                <tr>
                                    <td><b>Naam: </b></td>
                                    <td><span>{{$student->voor_naam ." ". $student->achter_naam}}</span></td>
                                </tr>
                                <tr>
                                    <td><b>Geboorte Datum: </b></td>
                                    <td><span>{{$student->geboorte_datum}}</span></td>
                                </tr>
                                <tr>
                                    <td><b>Geboorte Plaats: </b></td>
                                    <td><span>{{$student->geboorte_plaats}}</span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer" style="background:white">
                    <hr>
                    <a id="cardLogo" class="simple-text logo-mini" style="
                        width: 50%;
                        margin: 0 auto;
                        display: none;
                    ">
                        <div class="logo-image-small">
                            <img src="http://localhost:8000/paper/img/natin-logo.png">
                        </div>
                    </a>
                    <div class="button-container" style="background:white">
                        <div class="row" style="background:white">
                            {{-- <div class="col-lg-3 col-md-6 col-6 ml-auto">
                                <h5>{{ __('12') }}
                            <br>
                            <small>{{ __('Files') }}</small>
                            </h5>
                        </div>
                        <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                            <h5>{{ __('2GB') }}
                                <br>
                                <small>{{ __('Used') }}</small>
                            </h5>
                        </div> --}}
                        <div class="col-lg-12 mr-auto" style="background:white">
                            <a href="#" id="downloadStudentenKaart" onclick="downloadKaart()" style="background:white">
                                <h5> <i class="nc-icon nc-cloud-download-93" style="background:white"></i>
                                    <br>
                                    <small>{{ __('Download') }}</small>
                                </h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        {{-- <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('Team Members') }}</h4>
    </div>
    <div class="card-body">
        <ul class="list-unstyled team-members">
            <li>
                <div class="row">
                    <div class="col-md-2 col-2">
                        <div class="avatar">
                            <img src="{{ asset('paper/img/faces/ayo-ogunseinde-2.jpg') }}" alt="Circle Image"
                                class="img-circle img-no-padding img-responsive">
                        </div>
                    </div>
                    <div class="col-md-7 col-7">
                        {{ __('DJ Khaled') }}
                        <br />
                        <span class="text-muted">
                            <small>{{ __('Offline') }}</small>
                        </span>
                    </div>
                    <div class="col-md-3 col-3 text-right">
                        <button class="btn btn-sm btn-outline-success btn-round btn-icon"><i
                                class="fa fa-envelope"></i></button>
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-md-2 col-2">
                        <div class="avatar">
                            <img src="{{ asset('paper/img/faces/joe-gardner-2.jpg') }}" alt="Circle Image"
                                class="img-circle img-no-padding img-responsive">
                        </div>
                    </div>
                    <div class="col-md-7 col-7">
                        {{ __('Creative Tim') }}
                        <br />
                        <span class="text-success">
                            <small>{{ __('Available') }}</small>
                        </span>
                    </div>
                    <div class="col-md-3 col-3 text-right">
                        <button class="btn btn-sm btn-outline-success btn-round btn-icon"><i
                                class="fa fa-envelope"></i></button>
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-md-2 col-2">
                        <div class="avatar">
                            <img src="{{ asset('paper/img/faces/clem-onojeghuo-2.jpg') }}" alt="Circle Image"
                                class="img-circle img-no-padding img-responsive">
                        </div>
                    </div>
                    <div class="col-ms-7 col-7">
                        {{ __('Flume') }}
                        <br />
                        <span class="text-danger">
                            <small>{{ __('Busy') }}</small>
                        </span>
                    </div>
                    <div class="col-md-3 col-3 text-right">
                        <button class="btn btn-sm btn-outline-success btn-round btn-icon"><i
                                class="fa fa-envelope"></i></button>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div> --}}
</div>
<div class="col-md-8 text-center">
    <form class="col-md-12" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ __('Edit Profile') }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <label class="col-md-3 col-form-label">{{ __('Name') }}</label>
                    <div class="col-md-9">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Name"
                                value="{{ auth()->user()->name }}" required>
                        </div>
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-3 col-form-label">{{ __('Email') }}</label>
                    <div class="col-md-9">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email"
                                value="{{ auth()->user()->email }}" required>
                        </div>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
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
    <form class="col-md-12" action="{{ route('profile.password') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ __('Change Password') }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <label class="col-md-3 col-form-label">{{ __('Old Password') }}</label>
                    <div class="col-md-9">
                        <div class="form-group">
                            <input type="password" name="old_password" class="form-control" placeholder="Old password"
                                required>
                        </div>
                        @if ($errors->has('old_password'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('old_password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-3 col-form-label">{{ __('New Password') }}</label>
                    <div class="col-md-9">
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-3 col-form-label">{{ __('Password Confirmation') }}</label>
                    <div class="col-md-9">
                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Password Confirmation" required>
                        </div>
                        @if ($errors->has('password_confirmation'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
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
</div>
</div>
@endsection
@if ($isStudent)
@push('scripts')
<script type="text/javascript" src="{{ URL::asset('/paper/js/plugins/qrcode.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/paper/js/plugins/html2canvas.min.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded',()=>{
    var typeNumber = 6;
    var errorCorrectionLevel = 'Q';
    var qr = qrcode(typeNumber, errorCorrectionLevel);
    qr.addData('{{$user->QRpassword}}');
    qr.make();
    document.getElementById('placeHolder').innerHTML = qr.createSvgTag({
        scalable:true
    });
    })

    const downloadKaart= ()=>{
    document.getElementById('downloadStudentenKaart').style.display ="none"
    document.getElementById('cardLogo').style.display ="block"
     html2canvas(document.querySelector("#studentenkaart")).then(canvas => {
    saveAs(canvas.toDataURL(), 'file-name.png');
    });
    document.getElementById('cardLogo').style.display ="none"
    document.getElementById('downloadStudentenKaart').style.display ="block"
    }
    
function saveAs(uri, filename) {

    var link = document.createElement('a');

    if (typeof link.download === 'string') {

        link.href = uri;
        link.download = filename;

        //Firefox requires the link to be in the body
        document.body.appendChild(link);

        //simulate click
        link.click();

        //remove the link when done
        document.body.removeChild(link);

    } else {

        window.open(uri);

    }
}
</script>
@endpush
@endif