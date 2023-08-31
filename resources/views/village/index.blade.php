@extends('layouts.layout')

@section('title', 'Villages')

@section('content')
    <div class="container">
        <a href="{{ route('villages.create') }}" class="btn btn-success mb-3">Create</a>
        <x-index-table :items=$villages prefix="villages"
                       columns="name,x,y,lumber,clay,iron,net_lumber,net_clay,net_iron"/>
    </div>
@endsection
