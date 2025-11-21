@extends('layouts.admin')
@section('title', 'Karyawan')
@section('content')
   @livewire('admin.edit-karyawan',['id'=> $id])  
@endsection