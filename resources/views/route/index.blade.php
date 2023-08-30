@extends('layouts.layout')

@section('title', 'Villages')

@section('content')
    <div class="container">
        <a href="{{ route('routes.create') }}" class="btn btn-success mb-3">Create</a>
        <div class="card-body p-0">
            <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true"
                 style="position: relative; height: 700px">
                <table class="table table-dark mb-0 table-hover">
                    <thead style="background-color: #393939;">
                    <tr class="text-uppercase text-success">
                        <th>From</th>
                        <th>To</th>
                        <th>Lumber</th>
                        <th>Clay</th>
                        <th>Iron</th>
                        <th>crop</th>
                        <th>actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($routes as $route)
                        <tr>
                            <td>{{ $route->fromVillage->name }}</td>
                            <td>{{ $route->toVillage->name }}</td>
                            <td>{{ $route->lumber }}</td>
                            <td>{{ $route->clay }}</td>
                            <td>{{ $route->iron }}</td>
                            <td>{{ $route->crop }}</td>
                            <td>
                                <a href="{{ route("routes.show", $route->id) }}"
                                   class="btn btn-link btn-sm">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route("routes.edit", $route->id) }}"
                                   class="btn btn-link btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route("routes.destroy", $route->id) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4"><h1>No Items!</h1></td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        html,
        body,
        .intro {
            height: 100%;
        }

        table td,
        table th {
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;

        }

        .card {
            border-radius: .5rem;
        }

        .table-scroll {
            border-radius: .5rem;
        }

        thead {
            top: 0;
            position: sticky;
        }
    </style>
@endpush
