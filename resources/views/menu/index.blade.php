@extends('layouts.app')
@section('title', 'Menu')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? '' }}</h3>
        </div>
        <div class="card-body">
            <div class="mb-3" align="right">
                <a href="{{ route('menu.create') }}" class="btn btn-primary">Create New Menu</a>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Parent</th>
                        <th>Url</th>
                        <th>Icon</th>
                        <th>Access Role</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $index => $menu)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $menu->name }}</td>
                            <td>{{ $menu->parent_id ? $menu->parents->name : '-' }}</td>
                            <td>{{ $menu->url }}</td>
                            <td>{{ $menu->icon }}</td>
                            <td>
                                @foreach ($menu->roles as $role)
                                    <span class="badge bg-info text-dark">{{ $role->name }}</span>
                                @endforeach
                            <td>
                                @if ($menu->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-success btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- @foreach ($users as $index => $user)
                        <tr>
                            <td>{{ $index += 1 }}</td>
                            <td>{{ $user->name ?? '' }}</td>
                            <td>{{ $user->email ?? '' }}</td>
                            <td>
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success icon btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger icon btn-sm">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach --}}

@endsection
