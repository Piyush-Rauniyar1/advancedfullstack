@extends('layouts.app')

@section('title', 'Create Course')

@section('content')
<div class="card" style="max-width:600px;">
    <h1>Create Course</h1>

    @include('partials.errors')

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Course name">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" placeholder="Brief description">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="duration">Duration (weeks)</label>
            <input type="number" id="duration" name="duration" value="{{ old('duration') }}" placeholder="e.g. 12">
        </div>

        <div class="form-group">
            <label for="fee">Fee (£)</label>
            <input type="number" step="0.01" id="fee" name="fee" value="{{ old('fee') }}" placeholder="e.g. 299.99">
        </div>

        <div class="form-group">
            <label for="difficulty">Difficulty</label>
            <select id="difficulty" name="difficulty">
                @foreach(['Easy', 'Medium', 'Hard'] as $level)
                    <option value="{{ $level }}"
                        {{ old('difficulty', $course->difficulty ?? '') === $level ? 'selected' : '' }}>
                        {{ $level }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <div class="form-check">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" id="is_active" name="is_active" value="1"
                    {{ old('is_active', $course->is_active ?? true) ? 'checked' : '' }}>
                <label for="is_active" style="margin-bottom:0; cursor:pointer;">Active</label>
            </div>
        </div>

        <div style="display:flex; gap:1rem; align-items:center; margin-top:.5rem;">
            <button type="submit" class="btn btn-primary">Create Course</button>
            <a href="{{ route('courses.index') }}" class="back-link">← Back to Courses</a>
        </div>
    </form>
</div>
@endsection
