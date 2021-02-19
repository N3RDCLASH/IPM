<?php 
$user = Auth::user();
?>

@extends('layouts.app', [
'class' => '',
'elementActive' => 'saldo'
])

@section('content')
<div class="content">
    @if($user->hasRole('admin'))
    @include('pages.saldo.admin')
    @endif

    @if($user->hasRole('student'))
    @include('pages.saldo.student')
    @endif
</div>
@endsection

@push('scripts')
<script> 

</script>
@endpush