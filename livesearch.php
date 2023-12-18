<?php

include "inc/connection.php";

if (isset($_POST['input'])) {
    $search_query = $_POST['input'];

    // Perform your search query here and fetch results from the database
    // Replace the following code with your actual search logic

    $results = array(
        "Result 1",
        "Result 2",
        "Result 3",
    );

    // Output the results as JSON
    echo json_encode($results);
}
?>
