@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')
<div class="card" style="max-width:600px;">
    <h1>Edit Student</h1>

    @include('partials.errors')

    <form action="{{ route('students.update', $student) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $student->name) }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $student->email) }}">
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', $student->phone) }}">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea id="address" name="address">{{ old('address', $student->address) }}</textarea>
        </div>

        <div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" id="date_of_birth" name="date_of_birth"
                value="{{ old('date_of_birth', $student->date_of_birth?->format('Y-m-d')) }}">
        </div>

        <div style="display:flex; gap:1rem; align-items:center; margin-top:.5rem;">
            <button type="submit" class="btn btn-primary">Update Student</button>
            <a href="{{ route('students.index') }}" class="back-link">← Back to Students</a>
        </div>
    </form>
</div>
@endsection