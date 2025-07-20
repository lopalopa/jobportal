<?php

// Include database connection

include('../db/db.php');

 

// Check if employer ID is provided

if (isset($_GET['id'])) {

    $id = $_GET['id'];

 

    // Delete employer query

    $deleteQuery = "DELETE FROM employers WHERE id = $id";

 

    if ($conn->query($deleteQuery) === TRUE) {

        echo "Employer deleted successfully.";

    } else {

        echo "Error: " . $conn->error;

    }

} else {

    echo "No employer ID provided!";

}

 

// Close connection

$conn->close();

?>