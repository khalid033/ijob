<?php

class candidatDeleter {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function deletecandidat($id) {
        $id = mysqli_real_escape_string($this->conn, $id);
        
        $sql = "DELETE FROM `candidat` WHERE id = $id";
        $result = mysqli_query($this->conn, $sql);

        if ($result) {
            header("Location: candidat.php?mgs=Record deleted successfully");
        } else {
            echo "Failed: " . mysqli_error($this->conn);
        }
    }
}

require("../inc/connection.php");
$candidatDeleter = new candidatDeleter($conn);

if (isset($_GET['id'])) {
    $candidatDeleter->deletecandidat($_GET['id']);
}
?>