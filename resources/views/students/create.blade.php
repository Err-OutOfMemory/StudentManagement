<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1>เพิ่มนักเรียน</h1>
        <form class="row g-3 needs-validation" action="{{ route('students.store') }}" method="POST">
            @csrf

            <div class="col-md-4">
                <label for="student_id" class="form-label">Student ID</label>
                <input type="text" name="student_id" class="form-control" id="student_id" placeholder="Student ID"
                    required>
                <div class="invalid-feedback">
                    Please provide a valid Student ID.
                </div>
            </div>

            <div class="col-md-4">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
                <div class="invalid-feedback">
                    Please provide a name.
                </div>
            </div>

            <div class="col-md-4">
                <label for="surname" class="form-label">Surname</label>
                <input type="text" name="surname" class="form-control" id="surname" placeholder="Surname" required>
                <div class="invalid-feedback">
                    Please provide a surname.
                </div>
            </div>

            <div class="col-md-4">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" name="dob" class="form-control" id="dob" required>
                <div class="invalid-feedback">
                    Please provide a valid date of birth.
                </div>
            </div>

            <div class="col-md-4">
                <label for="gpa" class="form-label">GPA</label>
                <input type="number" step="0.01" min="0" max="4" name="gpa" class="form-control"
                    id="gpa" placeholder="GPA" required>
                <div class="invalid-feedback">
                    Please provide a valid GPA (0-4).
                </div>
            </div>

            <div class="col-md-4">
                <label for="school_id" class="form-label">School</label>
                <select name="school_id" class="form-select" id="school_id" required>
                    <option selected disabled value="">Choose a school</option>
                    @foreach ($schools as $school)
                        <option value="{{ $school->school_id }}">{{ $school->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Please select a school.
                </div>
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>
</body>
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

</html>
