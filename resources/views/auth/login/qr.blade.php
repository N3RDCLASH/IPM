<div class="col-md-12" id="qr-section">
    @if(!Auth::user())
    <video id="preview" class="col-sm-12">
    </video>
    <div class="row">
        <div id="message" class="text-center">
        </div>
    </div>
    @else
    <h1>Hallo! {{Auth::user()->first_name}}</h1>
    @endif
</div>


@if( !Auth::user())
@push('scripts')
<script type="text/javascript" src="{{ URL::asset('/paper/js/plugins/instascan.min.js') }}"></script>

<script type="text/javascript">
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview'),scanPeriod: 4});
    const initializeScanner = ()=>{
    scanner.addListener('scan', function (content) {
        axios.get('/sanctum/csrf-cookie')
        .then(
        axios.post('api/login/qr',{
        qrcode:content
        })
        .then(({data})=>{
        console.log(data)
        if (data.login_success){
        return Toast.fire({
        icon: 'success',
        title: 'Signed in successfully'
        }).then(()=>{
        clearInputs()
        window.location= `/home`
        }
        )
        }
        return Toast.fire({
        icon: 'error',
        title: 'Sign in failed'
        })
        
        })
        )
    
    });
    Instascan.Camera.getCameras().then(function (cameras) {
    if (cameras.length > 0) {
    scanner.start(cameras[0]);
    } else {
    console.error('No cameras found.');
    }
    }).catch(function (e) {
    console.error(e);
    });
}

</script>
@endpush
@endif