@extends('layouts.app')

@section('title', 'Student Details')

@section('content')
<div class="card" style="max-width:600px;">
    <h1>Student Details</h1>

    <ul class="detail-list">
        <li><span class="key">ID</span><span>{{ $student->id }}</span></li>
        <li><span class="key">Name</span><span>{{ $student->name }}</span></li>
        <li><span class="key">Email</span><span>{{ $student->email }}</span></li>
        <li><span class="key">Phone</span><span>{{ $student->phone }}</span></li>
        <li><span class="key">Address</span><span>{{ $student->address }}</span></li>
        <li><span class="key">Date of Birth</span><span>{{ $student->date_of_birth?->format('d M Y') }}</span></li>
        <li><span class="key">Age</span><span>{{ $student->age ?? 'Not available' }}</span></li>
    </ul>

    <div style="display:flex; gap:1rem; margin-top:1.5rem; align-items:center;">
        <a href="{{ route('students.edit', $student) }}" class="btn btn-warning">Edit Student</a>
        <a href="{{ route('students.index') }}" class="back-link">← Back to Students</a>
    </div>
</div>
@endsection
