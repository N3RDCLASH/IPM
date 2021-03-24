@extends ('layouts.app', [
'class' => 'login-page',
'backgroundImagePath' => 'img/bg/fabio-mangione.jpg'
])

@section('content')
<div class="content">
    <div class="d-flex justify-content-center">
        <input id="toggle-one" data-onstyle="warning" checked type="checkbox">
    </div>
    <div class="container">
        @include('auth.login.admin')
        @include('auth.login.student')
    </div>
    @yield('modal')
</div>
@endsection


@push('scripts')
<script>
    $(function() {
            $('#toggle-one').bootstrapToggle(
                {
                    on: 'Admin',
                    off: 'Student'
                }
            );
    })
    $(function() {
            $('#toggle-one').change(() => {
                if (document.querySelector('#toggle-one').checked) {
                    $('#admin-section').css("display", "block")
                    $('#student-section').css("display", "none")
                    $('#login-section').css("display", "none")
                } else {
                    $('#admin-section').css("display", "none")
                    $('#student-section').css("display", "block")
                    $('#login-section').css("display", "none")
                }
            })
        })

    $(document).ready(function() {
            checkFullPageBackgroundImage();
    });


</script>
@endpush