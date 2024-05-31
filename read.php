<?php
include_once 'config/Database.php';
include_once 'classes/User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$stmt = $user->read();
$num = $stmt->rowCount();

if ($num > 0) {
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Name</th>";
    echo "<th>Email</th>";
    echo "<th>Age</th>";
    echo "<th>Action</th>";
    echo "</tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$name}</td>";
        echo "<td>{$email}</td>";
        echo "<td>{$age}</td>";
        echo "<td><a href='update.php?id={$id}'>Edit</a> | <a href='delete.php?id={$id}'>Delete</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No users found.";
}
?>
