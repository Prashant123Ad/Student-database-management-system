document.addEventListener('DOMContentLoaded', function() {
    // Show form for adding a new student
    document.getElementById('add-student-link').addEventListener('click', function() {
        document.getElementById('student-form-container').style.display = 'block';
        document.getElementById('student-form').reset();
        document.querySelector('button[name="submit"]').style.display = 'inline';
        document.querySelector('button[name="delete"]').style.display = 'none';
        document.querySelector('button[name="update"]').style.display = 'none';
    });

    // Show form for updating student details
    document.getElementById('update-student-link').addEventListener('click', function() {
        document.getElementById('student-form-container').style.display = 'block';
        document.querySelector('button[name="submit"]').style.display = 'none';
        document.querySelector('button[name="delete"]').style.display = 'none';
        document.querySelector('button[name="update"]').style.display = 'inline';
    });

    // Show form for deleting a student
    document.getElementById('delete-student-link').addEventListener('click', function() {
        document.getElementById('student-form-container').style.display = 'block';
        document.getElementById('student-form').reset();
        document.querySelector('button[name="submit"]').style.display = 'none';
        document.querySelector('button[name="delete"]').style.display = 'inline';
        document.querySelector('button[name="update"]').style.display = 'none';
    });

    // Initialize calendar
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'
    });
    calendar.render();
});
