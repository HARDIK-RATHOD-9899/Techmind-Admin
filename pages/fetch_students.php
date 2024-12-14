<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
}
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['batch_id'])) {
    $batch_id = intval($_POST['batch_id']);

    $stmt = $conn->prepare("SELECT id, first_name FROM students WHERE batch_id = ?");
    $stmt->bind_param("i", $batch_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['first_name']}</td>
                    <td>
                        <input type='hidden' name='student_ids[]' value='{$row['id']}'>
                        <select name='status_{$row['id']}'>
                            <option value='Present'>Present</option>
                            <option value='Absent'>Absent</option>
                        </select>
                    </td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No students found for this batch.</td></tr>";
    }

    $stmt->close();
} else {
    echo "<tr><td colspan='3'>Invalid request.</td></tr>";
}
?>
