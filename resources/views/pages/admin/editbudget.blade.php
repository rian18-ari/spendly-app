@extends('layouts.admin')
@section('title', 'Budget Management')
@section('content')
    @livewire('admin.edit-budget', ['id' => $id])
@endsection