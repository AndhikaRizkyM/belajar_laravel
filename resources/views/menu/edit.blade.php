@extends('layouts.app')
@section('title', 'Menu')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? '' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('menu.update', $menu->id) }}" method="POST">
                @csrf
                @method('PUT')
                {{-- @dd($parents); --}}
                <div class="row">
                    <div class="mb-3">
                        <label for="" class="form-label">Menu Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $menu->name) }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Url</label>
                        <input type="text" class="form-control" name="url" value="{{ old('url', $menu->url) }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Parent ID</label>
                        <select name="parent_id" id="" class="form-control">
                            <option value="">Select One</option>
                            @foreach ($parents as $parent)
                                <option value="{{ $parent->id }}"
                                    {{ old('parent_id', $menu->parent_id) == $parent->id ? 'selected' : '' }}>
                                    {{ $parent->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Icon</label>
                    <input type="text" class="form-control" name="icon" value="{{ old('icon', $menu->icon) }}">
                </div>
                {{-- <div class="mb-3">
                            <label for="" class="form-label">Access Role</label>
                            <input type="text" class="form-control" placeholder="Enter Access Role" name="access_role"
                                required>
                        </div> --}}
                <div class="mb-3">
                    <label for="" class="form-label">Sort Order</label>
                    <input type="number" class="form-control" name="sort_order"
                        value="{{ old('sort_order', $menu->sort_order) }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Status</label>
                    <select name="is_active" id="" class="form-control">
                        <option value="">Select One</option>
                        <option value="1" {{ old('is_active', $menu->is_active) == 1 ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="0" {{ old('is_active', $menu->is_active) == 0 ? 'selected' : '' }}>
                            Inactive
                        </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label d-block">Assign to Roles</label>
                    @foreach ($roles as $role)
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="roles[]" id="role-{{ $role->id }}"
                                value="{{ $role->id }}" {{ in_array($role->id, $menuRoles) ? 'checked' : '' }}>

                            <label class="form-check-label" for="role-{{ $role->id }}">
                                {{ $role->name }}
                            </label>
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
