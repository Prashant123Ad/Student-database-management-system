<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$db = "ad"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form processing
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST['id']) ? $conn->real_escape_string($_POST['id']) : '';
    $roll = isset($_POST['roll']) ? $conn->real_escape_string($_POST['roll']) : '';
    $name = isset($_POST['name']) ? $conn->real_escape_string($_POST['name']) : '';
    $grade = isset($_POST['grade']) ? $conn->real_escape_string($_POST['grade']) : '';
    $section = isset($_POST['section']) ? $conn->real_escape_string($_POST['section']) : '';

    if (isset($_POST['submit'])) {
        $sql = "INSERT INTO student_tbl (id, roll, sname, grade, section) VALUES ('$id', '$roll', '$name', '$grade', '$section')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('New Record Added');</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    }

    if (isset($_POST['delete'])) {
        $sql2 = "DELETE FROM student_tbl WHERE id='$id'";
        if ($conn->query($sql2) === TRUE) {
            echo "<script>alert('Record Deleted Successfully');</script>";
            header('Refresh:0');
        } else {
            echo "<script>alert('Error deleting record: " . $conn->error . "');</script>";
        }
    }

    if (isset($_POST['update'])) {
        $sql3 = "UPDATE student_tbl SET roll='$roll', sname='$name', grade='$grade', section='$section' WHERE id='$id'";
        if ($conn->query($sql3) === TRUE) {
            echo "<script>alert('Update successful');</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    }
}

// Fetch student data for display
$sql = "SELECT * FROM student_tbl";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    <script src="script.js" defer></script>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="logo.png" alt="Logo">
        </div>
        <ul class="nav-links">
            <li><a href="#" id="student-detail-link"><i class="fas fa-user"></i><span>Student Detail</span></a></li>
            <li><a href="#" id="add-student-link"><i class="fas fa-user-plus"></i><span>Add Student Detail</span></a></li>
            <li><a href="#" id="update-student-link"><i class="fas fa-edit"></i><span>Update Student Detail</span></a></li>
            <li><a href="#" id="delete-student-link"><i class="fas fa-user-minus"></i><span>Delete Student Detail</span></a></li>
            <li><a href="#"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="dashboard-header">
            <div class="search-bar">
                <input type="text" placeholder="Search...">
                <i class="fas fa-search"></i>
            </div>
            <div class="username">
                <i class="fas fa-user-circle"></i>
                <span>Username</span>
            </div>
        </div>
        <div class="dashboard-body">
            <h1>Welcome to the Dashboard</h1>
            <div class="calendar">
                <h2>Calendar</h2>
                <div id="calendar"></div>
            </div>
            <div class="form-container" id="student-form-container" style="display: none;">
                <h2>Student Form</h2>
                <form id="student-form" action="index.php" method="post">
                    <label for="id">ID:</label>
                    <input type="text" id="id" name="id" required>

                    <label for="roll">Roll:</label>
                    <input type="text" id="roll" name="roll" required>

                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="grade">Grade:</label>
                    <input type="text" id="grade" name="grade" required>

                    <label for="section">Section:</label>
                    <input type="text" id="section" name="section" required>

                    <button type="submit" name="submit">Add</button>
                    <button type="submit" name="delete">Delete</button>
                    <button type="submit" name="update">Update</button>
                </form>
            </div>
            <div class="student-table-container">
                <table>
                    <tr>
                        <th>SN</th>
                        <th>ID</th> 
                        <th>ROLL</th> 
                        <th>NAME</th>
                        <th>GRADE</th> 
                        <th>SECTION</th>
                    </tr>
                    <?php
                    $sn = 1;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $sn . "</td>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['roll'] . "</td>";
                            echo "<td>" . $row['sname'] . "</td>";
                            echo "<td>" . $row['grade'] . "</td>";
                            echo "<td>" . $row['section'] . "</td>";
                            echo "</tr>";
                            $sn++;
                        }
                    } else {
                        echo "<tr><td colspan='6'>0 results</td></tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
