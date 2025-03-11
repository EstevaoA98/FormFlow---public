@extends('tamplates.head')

@section('title', 'Home')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@section('content')




@endsection