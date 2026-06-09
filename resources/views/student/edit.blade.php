@extends('layouts.app')
@section('title', 'Edit Student')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="class-title">{{ $title ?? '' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('student.update', $edit->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="" class="form-label">Student Name</label>
                    <input type="text" class="form-control" placeholder="Enter Your Name" name="name" required
                        value="{{ $edit->name }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Major Name</label> <br>
                    <select name="major_id" id="" class="form-control">
                        <option value="">Select One</option>
                        @foreach ($majors as $major)
                            <option {{ $major->id == $edit->major_id ? 'selected' : '' }} value="{{ $major->id }}">
                                {{ $major->name }}</option>
                            {{-- <option value="{{ $major->id }}">{{ $major->name }}</option> --}}
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" placeholder="Enter Your Phone Number" name="phone" required
                        value="{{ $edit->phone }}">
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ url()->previous() }}" class="text-secondary">Back</a>
            </form>
        </div>
    </div>
@endsection
