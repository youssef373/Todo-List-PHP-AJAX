<?php include 'Database.php' ?>
<?php include 'Operations.php' ?>


<?php
$db = new Database();
$conn = $db->connect();


$task = new Operations($conn);

$result =  $task->getTasks();

$count = $result->rowCount();

if($count > 0)
{
    while ($row = $result->fetch()){?>
        <li>

            <span class="text"><?php echo $row['task'];?></span>
            <i id="removeBtn" class="icon fas fa-trash-alt" data-id ="<?php echo $row['id'];?>"></i>

        </li>
<?php


    }
    ?>
<div class="pending-text">you have <?php echo $count;?> pending tasks</div>
<?php
}
?>

