@extends('layouts.layout')

@section('title', 'Villages')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Troop</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('villages.store') }}">
                            @csrf
                            <x-input name="name"/>
                            <x-input name="x"/>
                            <x-input name="y"/>
                            <x-input name="lumber"/>
                            <x-input name="clay"/>
                            <x-input name="iron"/>
                            <x-input name="crop"/>
                            
                            <div class="row mt-2 justify-content-center">
                                <button type="submit" class="btn btn-primary px-4 py-2 col-md-2">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
