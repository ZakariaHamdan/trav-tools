@extends('layouts.layout')

@section('title', $village->name)

@section('content')
    <div class="container">
        <div class="d-none">
            <table class="table" id="villages_net">
                <thead>
                <tr>
                    <td>Name</td>
                    <td>Lumber</td>
                    <td>Clay</td>
                    <td>Iron</td>
                    <td>Crop</td>
                </tr>
                </thead>
                <tbody>
                @foreach($villages as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->net_lumber }}</td>
                        <td>{{ $item->net_clay }}</td>
                        <td>{{ $item->net_iron }}</td>
                        <td>{{ $item->net_crop }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-none">
            <select id="village_select" class="form-control" name="incomingTradeRoute[from_village_id][]">
                <option selected hidden>Select Village</option>
                @foreach($villages ?? [] as $item)
                    @if($item->id != $village->id)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <form action="{{ route('villages.update', $village->id) }}" method="post">
            @csrf
            @method('patch')
            <div>
                <h1>{{ $village->name }}</h1>
                <div class="row">
                    <x-item-input :value="$village->lumber" label="Production Lumber" name="resources[lumber]"
                                  id="production_lumber"/>
                    <x-item-input :value="$village->clay" label="Production Clay" name="resources[clay]"
                                  id="production_clay"/>
                    <x-item-input :value="$village->iron" label="Production Iron" name="resources[iron]"
                                  id="production_iron"/>
                    <x-item-input :value="$village->crop" label="Production Crop" name="resources[crop]"
                                  id="production_crop"/>
                </div>
            </div>
            <div class="row">
                <label for="troops-select" class="my-2">Select Troops</label>
                <select id="troops-select" style="width: 75%" name="village_troops[]" multiple>
                    @foreach($troops as $troop)
                        <option value="{{ $troop->id }}"
                                data-lumber="{{ $troop->lumber }}"
                                data-clay="{{ $troop->clay }}"
                                data-iron="{{ $troop->iron }}"
                                data-crop="{{ $troop->crop }}"
                                data-train-time="{{ $troop->train_time }}"
                                {{ $villageTroops->pluck('troop_id')->contains($troop->id) ?'selected': '' }}
                        >{{ $troop->name }}</option>
                    @endforeach
                </select>
            </div>
            <div id="resources-needed" class="mt-2">
                <div class="row">
                    <x-item-input id="needed_lumber" name="resources[needed_lumber]" label="Needed Lumber"
                                  readonly="true"/>
                    <x-item-input id="needed_clay" name="resources[needed_clay]" label="Needed Clay" readonly="true"/>
                    <x-item-input id="needed_iron" name="resources[needed_iron]" label="Needed Iron" readonly="true"/>
                    <x-item-input id="needed_crop" name="resources[needed_crop]" label="Needed Crop" readonly="true"/>
                </div>
                <div class="row">
                    <x-item-input id="net_lumber" name="net_lumber"/>
                    <x-item-input id="net_clay" name="net_clay"/>
                    <x-item-input id="net_iron" name="net_iron"/>
                    <x-item-input id="net_crop" name="net_crop"/>
                </div>
            </div>
            <div>
                <h3>Incoming Trade Routes</h3>
                <button class="btn btn-primary mx-1" type="button" id="show_villages">Show Villages</button>
                <button class="btn btn-success mx-1 add-incoming-route" type="button">
                    <i class="bi bi-plus"></i>
                    Add Route
                </button>
                <table id="incoming-routes" class="table table-bordered mt-2">
                    <thead>
                    <tr>
                        <th>From</th>
                        <th>Lumber</th>
                        <th>Clay</th>
                        <th>Iron</th>
                        <th>Crop</th>
                        <th>
                            <a class="add-incoming-route"> Add <i class="bi bi-plus"></i></a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($incomingRoutes ?? [] as $route)
                        <tr>
                            <td>
                                <select id="village_select" class="form-control"
                                        name="incomingTradeRoute[from_village_id][]">
                                    <option selected hidden>Select Village</option>
                                    @foreach($villages ?? [] as $item)
                                        @if($village->id != $item->id)
                                            <option value="{{ $item->id }}" {{ $route->from_village_id !== $item->id ? '' : 'selected' }}>{{ $item->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input class="form-control" name="incomingTradeRoute[lumber][]"
                                       value={{ $route->lumber }}>
                            </td>
                            <td>
                                <input class="form-control" name="incomingTradeRoute[clay][]" value={{ $route->clay }}>
                            </td>
                            <td>
                                <input class="form-control" name="incomingTradeRoute[iron][]" value={{ $route->iron }}>
                            </td>
                            <td>
                                <input class="form-control" name="incomingTradeRoute[crop][]" value={{ $route->crop }}>
                            </td>
                            <td style="width:85px;">
                                <button type="button" class="btn btn-danger removeRow"><i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                <h3>Outgoing Trade Routes</h3>
                <table id="out-routes" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>To</th>
                        <th>Lumber</th>
                        <th>Clay</th>
                        <th>Iron</th>
                        <th>Crop</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($outRoutes ?? [] as $route)
                        <tr>
                            <td>
                                <input class="form-control" name="incomingTradeRoute[lumber][]"
                                       value={{ $route->toVillage->name }} readonly>
                            </td>
                            <td>
                                <input class="form-control" name="incomingTradeRoute[lumber][]"
                                       value={{ $route->lumber }} readonly>
                            </td>
                            <td>
                                <input class="form-control" name="incomingTradeRoute[clay][]"
                                       value={{ $route->clay }} readonly>
                            </td>
                            <td>
                                <input class="form-control" name="incomingTradeRoute[iron][]"
                                       value={{ $route->iron }} readonly>
                            </td>
                            <td>
                                <input class="form-control" name="incomingTradeRoute[crop][]"
                                       value={{ $route->crop }} readonly>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <button class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection

@push('scripts')
    @vite('resources/js/show.js')
@endpush
