<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>

    <h1>Edit Student</h1>

    <form action="/students/{{ $student->id }}" method="POST">

        @csrf
        @method('PUT')

        <label>Name:</label>
        <input type="text" name="name" value="{{ $student->name }}" required>
        <br><br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ $student->email }}" required>
        <br><br>

        <label>Phone:</label>
        <input type="text" name="phone" value="{{ $student->phone }}" required>
        <br><br>

        <label>Address:</label>
        <input type="text" name="address" value="{{ $student->address }}">
        <br><br>

        <label>Date of Birth:</label>
        <input type="date" name="date_of_birth" value="{{ $student->date_of_birth }}">
        <br><br>

        <button type="submit">Update Student</button>

    </form>

    <br>

    <a href="/students">Back to Students</a>

</body>
</html>