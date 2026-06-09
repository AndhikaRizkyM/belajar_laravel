@extends('layouts.app')
@section('title', 'Locker')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? '' }}</h3>
        </div>
        <div class="card-body">
            <div class="mb-3" align="right">
                <a href="{{ route('locker.create') }}" class="btn btn-primary fw-bold">Create New Locker</a>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Locker Code</th>
                        <th>Batch</th>
                        <th>Major</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lockers as $index => $locker)
                        <tr>
                            <td>{{ $index += 1 }}</td>
                            <td>{{ $locker->locker_name ?? '' }}</td>
                            <td>{{ $locker->batch ?? '' }}</td>
                            <td>{{ $locker->major ?? '' }}</td>
                            <td>
                                @if ($locker->status == 'Available')
                                    <span class="badge text-white bg-primary">Available</span>
                                @elseif ($locker->status == 'Unavailable')
                                    <span class="badge text-white bg-secondary">Unavailable</span>
                                @elseif ($locker->status == 'Damaged')
                                    <span class="badge text-white bg-warning">Damaged</span>
                                @elseif ($locker->status == 'Missing')
                                    <span class="badge text-white bg-danger">Missing</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('locker.edit', $locker->id) }}" class="btn btn-success icon btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('locker.destroy', $locker->id) }}" class="btn btn-danger icon btn-sm"
                                    data-confirm-delete="true"><i class="bi bi-trash"></i></a>
                                {{-- <form action="{{ route('locker.destroy', $locker->id) }}" method="POST">
                                    <button type="submit" class="btn btn-danger icon btn-sm" data-confirm-delete="true">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
