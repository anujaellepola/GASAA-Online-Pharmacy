<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "GASSA_DB";


// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to select all data from a table (change "your_table" to your actual table name)
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Open a file handle for writing
    $file = fopen('database_backup.txt', 'w');

    // Loop through the results and write them to the file
    while ($row = $result->fetch_assoc()) {
        foreach ($row as $key => $value) {
            fwrite($file, "$key: $value\n");
        }
        fwrite($file, "\n"); // Add a newline between rows
    }

    // Close the file handle
    fclose($file);

    // Output the file for download
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="database_backup.txt"');
    readfile('database_backup.txt');

    // Delete the temporary file
    unlink('database_backup.txt');
} else {
    echo "No data found in the database.";
}

// Close the database connection
$conn->close();
?>
