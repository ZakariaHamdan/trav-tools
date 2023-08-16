@extends('layouts.layout')

@section('title', 'Villages')

@section('content')
    <div class="container">
        <a href="{{ route('villages.create') }}" class="btn btn-success mb-3">Create</a>
        <x-index-table :items=$villages prefix="villages"
                       columns="name,x,y,lumber,clay,iron,crop"/>
    </div>
@endsection
