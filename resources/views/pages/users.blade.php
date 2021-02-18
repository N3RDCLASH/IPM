@extends('layouts.app', [
'class' => '',
'elementActive' => 'users'
])

@section('content')
<div class="content">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#admins" role="tab"
                aria-controls="nav-home" aria-selected="true">Admin</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#studenten" role="tab"
                aria-controls="nav-profile" aria-selected="false">Studenten</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="admin" role="tabpanel" aria-labelledby="nav-home-tab">
            {{-- admin stuff here --}}
            tralala
        </div>
        <div class="tab-pane fade" id="studenten" role="tabpanel" aria-labelledby="nav-profile-tab">
            {{-- student stuff here --}}
            bidnfdfjdf
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>

</script>
@endpush