<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-2">
        <h1>รายชื่อนักเรียนทั้งหมด</h1>
        <a href="{{ route('students.create') }}">Add New Student</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Student ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">GPA</th>
                    <th scope="col">School</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->student_id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->surname }}</td>
                        <td>{{ \Carbon\Carbon::parse($student->dob)->format('d/m/Y') }}</td>
                        <td>{{ $student->gpa }}</td>
                        <td>{{ $student->school->name }}</td>
                        <td>
                            <a href="{{ route('students.edit', $student) }}">Edit</a>
                            <form action="{{ route('students.destroy', $student) }}" method="POST"
                                onsubmit="return confirm('ยืนยันการลบหรือไม่?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
