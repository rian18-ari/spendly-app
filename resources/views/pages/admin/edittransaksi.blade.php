@extends('layouts.admin')
@section('content')
    @livewire('admin.edit-transaksi', ['id' => $id])
@endsection