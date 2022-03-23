<?php include 'Database.php' ?>
<?php include 'Operations.php' ?>



<?php

$id = $_POST['id'];

$db = new Database();
$conn = $db->connect();

$task = new Operations($conn);

echo $task->removeTask($id);



?>

