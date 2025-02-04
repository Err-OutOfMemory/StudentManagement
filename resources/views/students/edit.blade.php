<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1>แก้ไขข้อมูลนักเรียน</h1>

        <form action="{{ route('students.update', $student) }}" method="POST" class="needs-validation" novalidate>
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name"
                    value="{{ old('name', $student->name) }}" required>
                <div class="invalid-feedback">
                    Please enter a name.
                </div>
            </div>

            <div class="mb-3">
                <label for="surname" class="form-label">Surname</label>
                <input type="text" name="surname" class="form-control" id="surname"
                    value="{{ old('surname', $student->surname) }}" required>
                <div class="invalid-feedback">
                    Please enter a surname.
                </div>
            </div>

            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" name="dob" class="form-control" id="dob"
                    value="{{ old('dob', $student->dob) }}" required>
                <div class="invalid-feedback">
                    Please provide a valid date of birth.
                </div>
            </div>

            <div class="mb-3">
                <label for="gpa" class="form-label">GPA</label>
                <input type="number" name="gpa" class="form-control" id="gpa"
                    value="{{ old('gpa', $student->gpa) }}" min="0" max="4" step="0.01" required>
                <div class="invalid-feedback">
                    Please provide a valid GPA.
                </div>
            </div>

            <div class="mb-3">
                <label for="school_id" class="form-label">School</label>
                <select name="school_id" class="form-select" id="school_id" required>
                    @foreach ($schools as $school)
                        <option value="{{ $school->school_id }}"
                            {{ $student->school_id == $school->school_id ? 'selected' : '' }}>
                            {{ $school->name }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Please select a school.
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to Student List</a>
            </div>
        </form>
    </div>

    <script>
        (function() {
            'use strict'

            var forms = document.querySelectorAll('.needs-validation')

            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>

</body>

</html>
