<?php include 'Database.php' ?>
<?php include 'Operations.php' ?>


<?php
$db = new Database();
$conn = $db->connect();


$task = new Operations($conn);

echo $task->insert();