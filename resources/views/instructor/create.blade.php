@extends('layouts.app')
@section('title', 'Instructor')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? '' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('instructor.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Instructor Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Enter Your Name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Major</label> <br>
                    <select name="major_id" id="" class="form-control @error('major_id') is-invalid @enderror"
                        value="{{ old('major_id') }}">
                        @error('major_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <option value="">Select One</option>
                        @foreach ($majors as $major)
                            <option @selected(old('major_id') == $major->id) value="{{ $major->id }}">{{ $major->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Phone</label>
                    <input type="number" class="form-control" placeholder="Enter Your Phone Number"
                        value="{{ old('phone') }}" name="phone" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Enter Your Email" value="{{ old('email') }}"
                        name="email" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="Enter Your Password"
                        value="{{ old('password') }}" name="password" required>
                </div> <br>
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ url()->previous() }}" class="text-secondary">Back</a>
            </form>
            {{-- <form action="{{ route('instructor.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Instructor Name</label>
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
            </form> --}}
        </div>
    </div>
@endsection
