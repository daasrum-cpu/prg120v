<?php
$db = mysqli_connect("b-studentsql-1.usn.no", "daaas6345", "85acdaaas6345", "daaas6345");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>