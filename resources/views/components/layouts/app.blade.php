@extends('layouts.main')

@section('body')
    <h1>
        {{ isset($title) ? $title : '' }}
    </h1>
    @yield('content')
    
    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
