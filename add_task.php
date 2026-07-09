<?php
include "config.php";

$user_id = $_SESSION['user_id'];
$title = $_POST['title'];

mysqli_query($conn, "INSERT INTO tasks (user_id, title) VALUES ('$user_id', '$title')");

header("Location: dashboard.php");
?>