@extends('layouts.admin')
@section('content')
   @livewire('admin.edit-karyawan',['id'=> $id])  
@endsection