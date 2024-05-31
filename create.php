<?php
include_once 'config/Database.php';
include_once 'classes/User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if ($_POST) {
    $user->name = $_POST['name'];
    $user->email = $_POST['email'];
    $user->age = $_POST['age'];

    if ($user->create()) {
        echo "User was created.";
    } else {
        echo "Unable to create user.";
    }
}
?>

<form action="create.php" method="post">
    Name: <input type="text" name="name"><br>
    Email: <input type="text" name="email"><br>
    Age: <input type="text" name="age"><br>
    <input type="submit" value="Create">
</form>
