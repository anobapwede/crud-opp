<?php
include_once 'config/Database.php';
include_once 'classes/User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if ($_POST) {
    $user->id = $_POST['id'];
    $user->name = $_POST['name'];
    $user->email = $_POST['email'];
    $user->age = $_POST['age'];

    if ($user->update()) {
        echo "User was updated.";
    } else {
        echo "Unable to update user.";
    }
} else {
    $user->id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Update User</h2>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $user->id; ?>">
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $user->name; ?>"><br>
            <label>Email:</label>
            <input type="text" name="email" value="<?php echo $user->email; ?>"><br>
            <label>Age:</label>
            <input type="text" name="age" value="<?php echo $user->age; ?>"><br>
            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>
