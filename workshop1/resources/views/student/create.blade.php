<!DOCTYPE html>
<html>
<head>
    <title>Create Student</title>
</head>
<body>

    <h1>Create Student</h1>

    <form action="/student" method="POST">

        @csrf

        <label>Name:</label>
        <input type="text" name="name">
        <br><br>

        <label>Email:</label>
        <input type="email" name="email">
        <br><br>

        <label>Phone:</label>
        <input type="text" name="phone">
        <br><br>

        <label>Address:</label>
        <input type="text" name="address">
        <br><br>

        <label>Date of Birth:</label>
        <input type="date" name="date_of_birth">
        <br><br>

        <button type="submit">Create Student</button>

    </form>

</body>
</html>