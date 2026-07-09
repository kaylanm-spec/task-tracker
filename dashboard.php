<?php
include "config.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

$user_id = $_SESSION['user_id'];
$tasks = mysqli_query($conn, "SELECT * FROM tasks WHERE user_id='$user_id'");
?>

<h2>Welcome, <?php echo $_SESSION['name']; ?></h2>

<form method="POST" action="add_task.php">
    <input type="text" name="title" placeholder="Enter task" required>
    <button>Add Task</button>
</form>

<h3>Your Tasks</h3>

<?php while ($task = mysqli_fetch_assoc($tasks)) { ?>
    <p>
        <?php echo $task['title']; ?> - <?php echo $task['status']; ?>

        <?php if ($task['status'] == 'pending') { ?>
            <a href="complete_task.php?id=<?php echo $task['id']; ?>">Complete</a>
        <?php } ?>

        <a href="delete_task.php?id=<?php echo $task['id']; ?>">Delete</a>
    </p>
<?php } ?>

<a href="logout.php">Logout</a>