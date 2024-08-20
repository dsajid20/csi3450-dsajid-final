<?php
include 'db_connect.php';

$qualifications = [
    ['SEC-45', 'Secretarial work; candidate must type at least 45 words per minute'],
    ['SEC-60', 'Secretarial work; candidate must type at least 60 words per minute'],
    ['CLERK', 'General clerking work'],
    ['PRG-PY', 'Programmer, Python'],
    ['PRG-C++', 'Programmer, C++'],
    ['DBA-ORA', 'Database Administrator, Oracle'],
    ['DBA-DB2', 'Database Administrator, IBM DB2'],
    ['DBA-SQLSERV', 'Database Administrator, MS SQL Server'],
    ['SYS-1', 'Systems Analyst, level 1'],
    ['SYS-2', 'Systems Analyst, level 2'],
    ['NW-CIS', 'Network Administrator, Cisco experience'],
    ['WD-CF', 'Web Developer, ColdFusion']
];

foreach ($qualifications as $qualification) {
    $code = $qualification[0];
    $name = $qualification[1];
    
    $sql = "INSERT INTO Qualification (code, name) VALUES ('$code', '$name')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Qualification '$name' with code '$code' added successfully.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
    }
}

$conn->close();
?>
