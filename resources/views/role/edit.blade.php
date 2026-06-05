@extends('layouts.app')
@section('title', 'Create New Role')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="class-title">{{ $title ?? '' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('role.update', $edit->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Role Name</label>
                    <input type="text" class="form-control" placeholder="Enter Your Name" name="name" required
                        value="{{ $edit->name }}">
                </div>
                <div class="mb-3">
                    <label for="">Status</label> <br>
                    <input type="radio" name="is_active" value="1" class="form-check-input mb-2" checked> Active <br>
                    <input type="radio" name="is_active" value="0" class="form-check-input" checked> Inactive
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ url()->previous() }}" class="text-secondary">Back</a>
            </form>
        </div>
    </div>
@endsection
