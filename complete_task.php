<?php
include "config.php";

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

mysqli_query($conn, "UPDATE tasks SET status='completed' WHERE id='$id' AND user_id='$user_id'");

header("Location: dashboard.php");
?>