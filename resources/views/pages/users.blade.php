@extends('layouts.app', [
'class' => '',
'elementActive' => 'users'
])

@section('content')
<div class="content">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="#">Admin</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Studenten</a>
        </li>
        <li class="nav-item">
        </li>
    </ul>
</div>
@endsection

@push('scripts')
<script>

</script>
@endpush