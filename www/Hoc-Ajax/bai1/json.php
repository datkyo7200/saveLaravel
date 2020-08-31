
<?php
// Connect Database
$conn  = mysqli_connect("localhost", "root", "", "test1") or die('Can not connect to mysql');

// Get List Member
$query = mysqli_query($conn, 'select * from member');

// Biến result
$result = array();

if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query, MYSQL_ASSOC)) {
        $result[] = array(
            'username' => $row['username'],
            'email' => $row['email']
        );
    }
}

die(json_encode($result));
?>