# Student Database Management System

This project is a Student Database Management System designed to manage student data effectively. It includes functionalities to add, update, delete, and search student details, all through an interactive user interface.

## Features

- Add new student details
- Update existing student records
- Delete student details
- Search for students by name or ID
- User-friendly login interface
- Display all student records

## Technologies Used

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL

## Prerequisites

- **Web Server**: Apache or XAMPP/WAMP
- **Database**: MySQL
- **PHP Version**: 7.4 or higher

## Setup Instructions

1. Clone the repository:
   ```bash
   git clone https://github.com/Prashant123Ad/Student-database-management-system.git
   cd Student-database-management-system
   ```

2. Import the database:
   - Open `phpMyAdmin`.
   - Create a new database named `student_db`.
   - Import the SQL file provided in the repository.

3. Configure the database connection:
   - Open the `config.php` file.
   - Update the following variables with your database details:
     ```php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "student_db";
     ```

4. Start the server:
   - If using XAMPP:
     - Start Apache and MySQL services.
   - Place the project folder in the `htdocs` directory.

5. Access the application:
   - Open a browser and go to:
     ```
     http://localhost/Student-database-management-system
     ```

## File Structure

- `index.php`: Main dashboard and php connection
- `login.html`: Login page for the system
- `login.css`: Styling for the login page
- `script.js`: JavaScript for interactive functionalities
- `styles.css`: General styling for the project
- `logo.png`: Logo for branding
- `1.png`: Sample image for the interface

## Usage

1. Navigate to the login page and authenticate using valid credentials.
2. Access the dashboard for adding, updating, deleting, and searching student records.
3. Use the search functionality to quickly locate student details.

## Future Enhancements

- Add user authentication with roles (e.g., admin and user).
- Implement export options for reports (e.g., PDF, Excel).
- Enhance UI with responsive design.

## References

- [PHP Documentation](https://www.php.net/)
- [MySQL Documentation](https://dev.mysql.com/doc/)

---

### Author
Prashant Adhikari  
  
**GitHub**: [Prashant123Ad](https://github.com/Prashant123Ad)

Feel free to raise an issue if you encounter any problems or have suggestions for improvement.
