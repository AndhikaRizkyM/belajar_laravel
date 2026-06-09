@extends('layouts.app')
@section('title', 'Create New Student')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="class-title">{{ $title ?? '' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('student.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Student Name</label>
                    <input type="text" class="form-control" placeholder="Enter Your Name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Major</label> <br>
                    <select name="major_id" id="" class="form-control">
                        <option value="">Select One</option>
                        @foreach ($majors as $major)
                            <option value="{{ $major->id }}">{{ $major->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Phone Number</label>
                    <input type="number" class="form-control" placeholder="Enter Your Phone Number" name="phone"
                        required>
                </div> <br>
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ url()->previous() }}" class="text-secondary">Back</a>
            </form>
        </div>
    </div>
@endsection
