<?php

class OffreDeleter {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function deleteOffre($id) {
        $id = mysqli_real_escape_string($this->conn, $id);
        
        $sql = "DELETE FROM `offre` WHERE id = $id";
        $result = mysqli_query($this->conn, $sql);

        if ($result) {
            header("Location: emploi.php?mgs=Record deleted successfully");
        } else {
            echo "Failed: " . mysqli_error($this->conn);
        }
    }
}

require("../inc/connection.php");
$offreDeleter = new OffreDeleter($conn);

if (isset($_GET['id'])) {
    $offreDeleter->deleteOffre($_GET['id']);
}
?>
