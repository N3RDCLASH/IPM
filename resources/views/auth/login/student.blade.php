<div class="col-lg-4 col-md-6 ml-auto mr-auto" id="student-section" style="display: none;">
    <div class="card card-login">
        <div class="card-header ">
            <div class="card-header ">
                <h3 class="header text-center">{{ __('Login') }}</h3>
            </div>
        </div>
        <div class="card-body ">
            <div class="d-flex flex-column">

                <button class="btn btn-outline-warning btn-round" onclick="showQRLogin()" data-toggle="modal"
                    data-target="#modalQR">
                    <i class="fa fa-qrcode"></i> QR Code Login
                </button>
                <button class="btn btn-outline-warning btn-round" onclick="showPinLogin()">
                    <i class="fa fa-key"></i> Pin Code Login
                </button>
            </div>

        </div>
    </div>
    <a href="{{ route('password.request') }}" class="btn btn-link">
        {{ __('Forgot password') }}
    </a>
</div>
<div class="col-lg-4 col-md-6 ml-auto mr-auto" id="login-section" style="display: none;">
    <div class="card card-login">
        <div class="card-header ">
            <div class="card-header ">
                <h3 class="header text-center">{{ __('Login') }}</h3>
            </div>
        </div>
        <div class="card-body d-flex flex-column align-items-center">
            @include('auth.login.qr')
            @include('auth.login.pin')
        </div>
    </div>
</div>

@push('scripts')
<script>
    const showQRLogin = ()=>{
        document.getElementById('student-section').style.display = "none"
        document.getElementById('login-section').style.display = "block"
        document.getElementById('pin-section').style.display = "none"
        initializeScanner()
        document.getElementById('pin-section').style.display = "none"
        document.getElementById('qr-section').style.display = "block"
}
    const showPinLogin = ()=>{
    document.getElementById('student-section').style.display = "none"
    document.getElementById('login-section').style.display = "block"
    document.getElementById('pin-section').style.display = "block"
    document.getElementById('qr-section').style.display = "none"
    scanner.stop()
    inputs[0].focus()
}

</script>
@endpush