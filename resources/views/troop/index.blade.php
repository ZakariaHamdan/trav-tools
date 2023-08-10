@extends('layouts.layout')

@section('title', 'Troops')

@section('content')
    <div class="container">
        <x-index-table :items=$troops prefix="troops"/>
    </div>
@endsection
