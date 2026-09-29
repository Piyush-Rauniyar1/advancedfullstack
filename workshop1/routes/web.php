```php
<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/student/create', function () {
    return view('student.create');
});

Route::post('/student', function (Request $request) {

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string|max:500',
        'date_of_birth' => 'nullable|date',
    ]);

    $student = Student::create($validated);

    return "Student {$student->name} created successfully!";
});

Route::get('/students', function () {

    $students = Student::all();

    return view('student.list', [
        'students' => $students
    ]);
});

Route::get('/students/{student}', function (Student $student) {

    return view('student.show', [
        'student' => $student
    ]);
});

Route::get('/students/{student}/edit', function (Student $student) {

    return view('student.edit', [
        'student' => $student
    ]);
});

Route::put('/students/{student}', function (Request $request, Student $student) {

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string|max:500',
        'date_of_birth' => 'nullable|date',
    ]);

    $student->update($validated);

    return redirect('/students')->with(
        'success',
        'Student updated successfully!'
    );
});

Route::delete('/students/{student}', function (Student $student) {

    $student->delete();

    return redirect('/students')->with(
        'success',
        'Student deleted successfully!'
    );
});

