<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $candidate_id = $_POST['candidate_id'];

    // Delete from Candidate_Qualification first if it exists
    $sql = "DELETE FROM Candidate_Qualification WHERE candidate_id = $candidate_id";
    $conn->query($sql);

    // Delete from Candidate_Session if it exists
    $sql = "DELETE FROM Candidate_Session WHERE candidate_id = $candidate_id";
    $conn->query($sql);

    // Delete from Job_History if it exists
    $sql = "DELETE FROM Job_History WHERE candidate_id = $candidate_id";
    $conn->query($sql);

    // Delete from Placement if it exists
    $sql = "DELETE FROM Placement WHERE candidate_id = $candidate_id";
    $conn->query($sql);

    // Finally, delete the candidate
    $sql = "DELETE FROM Candidate WHERE candidate_id = $candidate_id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Candidate deleted successfully";
    } else {
        echo "Error deleting candidate: " . $conn->error;
    }

    $conn->close();
}
?>

