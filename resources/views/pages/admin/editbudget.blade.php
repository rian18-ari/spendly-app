@extends('layouts.admin')
@section('title', 'Budget')
@section('content')
    @livewire('admin.edit-budget', ['id' => $id])
@endsection