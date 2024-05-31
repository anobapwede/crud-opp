<?php
include_once 'config/Database.php';
include_once 'classes/User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$user->id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

if ($user->delete()) {
    echo "User was deleted.";
} else {
    echo "Unable to delete user.";
}
?>
