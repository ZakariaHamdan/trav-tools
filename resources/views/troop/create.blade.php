@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Troop</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('troops.store') }}">
                            @csrf
                            <x-input name="name"/>
                            <x-input name="tribe"/>
                            <x-input name="lumber"/>
                            <x-input name="clay"/>
                            <x-input name="iron"/>
                            <x-input name="crop"/>
                            <x-input name="train_time"/>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
