<?php
include 'db.php'; 

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=student_records.xls");
header("Pragma: no-cache");
header("Expires: 0");

$sql = "SELECT * FROM students";
$result = $conn->query($sql);

echo "<table border='1'>
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th>Batch ID</th>
            <th>Course ID</th>
            <th>Enrollment Date</th>
            <th>Total Fee</th>
            <th>Paid Amount</th>
            <th>Due Amount</th>
            <th>Which Installments</th>
            <th>Installments Amount</th>
            <th>Profile Image</th>
        </tr>
    </thead>
    <tbody>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['first_name']}</td>
            <td>{$row['last_name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['contact_number']}</td>
            <td>{$row['batch_id']}</td>
            <td>{$row['course_id']}</td>
            <td>{$row['enrollment_date']}</td>
            <td>{$row['total_fee']}</td>
            <td>{$row['paid_amount']}</td>
            <td>{$row['due_amount']}</td>
            <td>{$row['installments']}</td>
            <td>{$row['installment_amount']}</td>
            <td>{$row['profile_image']}</td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='14'>No records found</td></tr>";
}

echo "</tbody></table>";

$conn->close();
?>
