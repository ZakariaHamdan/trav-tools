@extends('layouts.layout')

@section('title', 'Villages')

@section('content')
    <div class="container">
        <form action="{{ route('villages.store-many') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <label for="text" class="h3">
                    Go to travian Press ctrl + a and then ctrl + c in this box
                </label>
                <textarea rows="20" name="text" id="text"></textarea>
                
                <div class="col-md-6 mt-4 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Submit') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection