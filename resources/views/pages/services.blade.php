<?php 
$user = Auth::user();
?>

@extends('layouts.app', [
'class' => '',
'elementActive' => 'services'
])

@section('content')
<div class="content">

    @if($user->hasRole('admin'))
    @include('pages.services.admin')
    @endif
    
    @if($user->hasRole('student'))
    @include('pages.services.student')
    @endif


</div>
@endsection

@push('scripts')
<script>

</script>
@endpush