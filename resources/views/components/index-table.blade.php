@props([
    'items',
    'prefix',
    'columns',
])
<div class="card-body p-0">
    <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true"
         style="position: relative; height: 700px">
        <table class="table table-dark mb-0 table-hover">
            <thead style="background-color: #393939;">
            <tr class="text-uppercase text-success">
                @forelse($items?->first()?->getAttributes() ?? [] as $key => $value)
                    @isset($columns)
                        @if(\Str::contains($columns, $key))
                            <th>{{ \Str::snakeToTitle($key) }}</th>
                        @endif
                    @else
                        <th>{{ \Str::snakeToTitle($key) }}</th>
                    @endisset
                @empty
                    <th>No Items!</th>
                @endforelse
                <th style="width: 1rem">Actions</th>
            </tr>
            </thead>
            <tbody>

            @forelse($items as $item)
                <tr>
                    @forelse($item->getAttributes() as $key => $value)
                        @isset($columns)
                            @if(\Str::contains($columns, $key))
                                <td>{{ $value }}</td>
                            @endif
                        @else
                            <td>{{ $value }}</td>
                        @endisset
                    @empty
                        <td>No data available</td>
                    @endforelse
                    <td>
                        <a href="{{ route("{$prefix}.show", $item->id) }}"
                           class="btn btn-link btn-sm">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route("{$prefix}.edit", $item->id) }}"
                           class="btn btn-link btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route("{$prefix}.destroy", $item->id) }}"
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
