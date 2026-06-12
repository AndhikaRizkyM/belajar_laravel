@extends('layouts.app')
@section('title', 'Menu')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? '' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('menu.store') }}" method="post">
                @csrf
                {{-- @dd($parents); --}}
                <div class="row">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Menu Name</label>
                        <input type="text" class="form-control" placeholder="Enter Menu Name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Url</label>
                        <input type="text" class="form-control" placeholder="Enter Url" name="url">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Parent ID</label>
                        <select name="parent_id" id="" class="form-control">
                            <option value="">Select One</option>
                            @foreach ($parents as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Icon</label>
                    <input type="text" class="form-control" placeholder="Enter Icon Name" name="icon">
                </div>
                {{-- <div class="mb-3">
                            <label for="" class="form-label">Access Role</label>
                            <input type="text" class="form-control" placeholder="Enter Access Role" name="access_role"
                                required>
                        </div> --}}
                <div class="mb-3">
                    <label for="" class="form-label">Sort Order</label>
                    <input type="number" class="form-control" placeholder="Enter Sort Order" name="sort_order">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Status</label>
                    <select name="is_active" id="" class="form-control">
                        <option value="">Select One</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label d-block">Assign to Roles</label>
                    @foreach ($roles as $role)
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="roles[]" id="role-{{ $role->id }}" value="{{ $role->id }}">
                            <label for="" class="form-check-label"
                                for="role-{{ $role->id }}">{{ $role->name }}</label>
                        </div>
                    @endforeach
                </div><br>
                <button class="btn
                            btn-primary" type="submit">Save</button>
                <a href="{{ url()->previous() }}" class="text-secondary">Back</a>
            </form>
        </div>
    </div>
@endsection
