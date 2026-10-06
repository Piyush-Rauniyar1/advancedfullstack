@extends('layouts.app')

@section('title', 'Students')

@section('content')
<div class="card">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;">
        <h1 style="margin-bottom:0;">Students</h1>
        <a href="{{ route('students.create') }}" class="btn btn-primary">+ Add Student</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('students.show', $student) }}" class="btn btn-info">View</a>
                            <a href="{{ route('students.edit', $student) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('students.destroy', $student) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Delete this student?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align:center; color:var(--muted); padding:2rem;">
                        No students found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection