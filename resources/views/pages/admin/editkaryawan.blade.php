@extends('layouts.admin')
@section('title', 'Edit Karyawan')
@section('content')
   @livewire('admin.edit-karyawan',['id'=> $id])  
@endsection