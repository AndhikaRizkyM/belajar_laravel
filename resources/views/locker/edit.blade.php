@extends('layouts.app')
@section('title', 'Locker')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? '' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('locker.update', $edit->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Locker Code</label>
                    <input type="number" class="form-control" @error('locker_name') is_invalid @enderror
                        value="{{ old('locker_name', $edit->locker_name) }}" placeholder="Enter locker code"
                        name="locker_name" required>
                    @error('locker_name')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Batch</label>
                    <select name="batch" class="form-select" required>
                        <option value="">--Choose Batch--</option>
                        <option value="1" {{ old('batch', $edit->batch) == '1' ? 'selected' : '' }}>Batch 1</option>
                        <option value="2" {{ old('batch', $edit->batch) == '2' ? 'selected' : '' }}>Batch 2</option>
                        <option value="3" {{ old('batch', $edit->batch) == '3' ? 'selected' : '' }}>Batch 3</option>
                        <option value="4" {{ old('batch', $edit->batch) == '4' ? 'selected' : '' }}>Batch 4</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Major</label>
                    <select name="major" class="form-select" required>
                        <option value="">--Choose Major--</option>
                        <option value="Web Programming"
                            {{ old('major', $edit->major) == 'Web Programming' ? 'selected' : '' }}>
                            Web Programming
                        </option>
                        <option value="Content Creator"
                            {{ old('major', $edit->major) == 'Content Creator' ? 'selected' : '' }}>
                            Content Creator
                        </option>
                        <option value="Multimedia" {{ old('major', $edit->major) == 'Multimedia' ? 'selected' : '' }}>
                            Multimedia
                        </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="">--Choose Status--</option>
                        <option value="Available" {{ old('status', $edit->status) == 'Available' ? 'selected' : '' }}>
                            Available</option>
                        <option value="Unavailable" {{ old('status', $edit->status) == 'Unavailable' ? 'selected' : '' }}>
                            Unavailable</option>
                        <option value="Damaged" {{ old('status', $edit->status) == 'Damaged' ? 'selected' : '' }}>Damaged
                        </option>
                        <option value="Missing" {{ old('status', $edit->status) == 'Missing' ? 'selected' : '' }}>Missing
                        </option>
                    </select>
                </div>

                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ url()->previous() }}" class="text-secondary">Back</a>
            </form>
            {{-- <form action="{{ route('locker.update', $edit->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="" class="form-label">Locker Code</label>
                    <input type="number" name="locker_name" class="form-control @error('locker_name') is_invalid @enderror"
                        value="{{ $edit->locker_name }}" required>
                    @error('locker_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Batch</label>
                    <select name="batch" class="form-select" required>
                        <option value=""></option>
                        <option value="1">Batch 1</option>
                        <option value="2">Batch 2</option>
                        <option value="3">Batch 3</option>
                        <option value="4">Batch 4</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Major</label>
                    <select name="major" class="form-select" required>
                        <option value="{{ old('$edit->major') }}"></option>
                        <option value="Web Programming">Web Programming</option>
                        <option value="Content Creator">Content Creator</option>
                        <option value="Multimedia">Multimedia</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="">-- Choose Status --</option>
                        <option value="Available">Available</option>
                        <option value="Unavailable">Unavailable</option>
                        <option value="Damaged">Damaged</option>
                        <option value="Missing">Missing</option>
                    </select>
                </div> <br>
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ url()->previous() }}" class="text-secondary">Back</a>
            </form> --}}
        </div>
    </div>
@endsection
