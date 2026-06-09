@extends('layouts.app')
@section('title', 'Key Management')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="class-title">{{ $title ?? '' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('key.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Key Name</label>
                    <input type="text" class="form-control" placeholder="Enter Your Key" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Status</label> <br>
                    <input type="radio" name="is_active" value="1" class="form-check-input" checked> Active <br>
                    <input type="radio" name="is_active" value="0" class="form-check-input"> Inactive
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ url()->previous() }}" class="text-secondary">Back</a>
            </form>
        </div>
    </div>
@endsection
