@extends('layouts.app')

@section('title', 'Course Details')

@section('content')
<div class="card" style="max-width:600px;">
    <h1>Course Details</h1>

    <ul class="detail-list">
        <li><span class="key">ID</span><span>{{ $course->id }}</span></li>
        <li><span class="key">Name</span><span>{{ $course->name }}</span></li>
        <li><span class="key">Description</span><span>{{ $course->description }}</span></li>
        <li><span class="key">Duration</span><span>{{ $course->duration }} weeks</span></li>
        <li><span class="key">Fee</span><span>£{{ number_format($course->fee, 2) }}</span></li>
        <li><span class="key">Difficulty</span><span>{{ $course->difficulty }}</span></li>
        <li>
            <span class="key">Active</span>
            <span>
                @if($course->is_active)
                    <span class="badge badge-yes">Yes</span>
                @else
                    <span class="badge badge-no">No</span>
                @endif
            </span>
        </li>
    </ul>

    <div style="display:flex; gap:1rem; margin-top:1.5rem; align-items:center;">
        <a href="{{ route('courses.edit', $course) }}" class="btn btn-warning">Edit Course</a>
        <a href="{{ route('courses.index') }}" class="back-link">← Back to Courses</a>
    </div>
</div>
@endsection
