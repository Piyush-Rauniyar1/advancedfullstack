@extends('layouts.app')

@section('title', 'Courses')

@section('content')
<div class="card">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;">
        <h1 style="margin-bottom:0;">Courses</h1>
        <a href="{{ route('courses.create') }}" class="btn btn-primary">+ Add Course</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Duration</th>
                <th>Fee</th>
                <th>Difficulty</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->duration }}</td>
                    <td>£{{ number_format($course->fee, 2) }}</td>
                    <td>{{ $course->difficulty }}</td>
                    <td>
                        @if($course->is_active)
                            <span class="badge badge-yes">Yes</span>
                        @else
                            <span class="badge badge-no">No</span>
                        @endif
                    </td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('courses.show', $course) }}" class="btn btn-info">View</a>
                            <a href="{{ route('courses.edit', $course) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('courses.destroy', $course) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Delete this course?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align:center; color:var(--muted); padding:2rem;">
                        No courses found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
