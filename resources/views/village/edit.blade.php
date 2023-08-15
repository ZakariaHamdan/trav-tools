@extends('layouts.layout')

@section('title', 'Villages')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Troop</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('villages.update', $village->id) }}">
                            @method('PATCH')
                            @csrf
                            <div class="row mx-5">
                                <label for="text" class="h3">
                                    Go to village Press ctrl + a and then ctrl + c in this box
                                </label>
                                <textarea rows="20" name="res_text" id="text"></textarea>
                            </div>

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
