<?php
// Dummy credentials
$credentials = [
    "student" => ["username" => "student", "password" => "S BIT Student"],
    "admin" => ["username" => "admin", "password" => "F BIT Admin"]
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entered_username = $_POST["username"];
    $entered_password = $_POST["password"];
    
    // Check if credentials exist
    if (array_key_exists($entered_username, $credentials) && $entered_password == $credentials[$entered_username]["password"]) {
        // Successful login
        $firstLetter = strtoupper(substr($entered_password, 0, 1)); // Get the first letter of the password
        
        // Redirect based on the first letter of the password
        if ($firstLetter == 'S') {
            // Redirect to student dashboard
            header("Location: student_dashboard.php");
            exit;
        } elseif ($firstLetter == 'A') {
            // Redirect to admin dashboard
            header("Location: admin_dashboard.php");
            exit;
        }
    } else {
        // Invalid credentials
        echo "Invalid username or password";
    }
}