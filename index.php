

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<div class="wrapper">
    <h2 class="title">Todo List App</h2>
    <div class="inputFields"
    <label for="taskValue">
        <input id="taskValue" name="task" type="text">
    </label>
        <button name="submit" type="submit" id="addBtn" class="btn"><i class="fa fa-plus"></i></button>
    </div>
    <div class="content">
        <ul id="tasks">

        </ul>
    </div>
</div>
<script>

        $(document).ready(function()
        {
            //show tasks
            function loadTasks()
            {
                $.ajax({
                    url: "show-tasks.php",
                    type: "POST",
                    success: function (data){
                        $("#tasks").html(data);
                    }
                })
            }

            loadTasks();

            //add task
            $("#addBtn" ).on("click", function(e) {
                e.preventDefault();
                var task = $("#taskValue").val();
                $.ajax({
                    url: "add-task.php",
                    type: "POST",
                    data: {task: task},
                    success: function(data)
                    {
                        if(data)
                        {
                            loadTasks();
                            alert('task added')
                        }
                    }
                });
            });

            //Remove Task
            $(document).on("click", "#removeBtn", function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                $.ajax({
                        url: "remove-task.php",
                        type: "POST",
                        data: {id: id},
                        success: function(data) {
                            if(data)
                            {
                                alert('task deleted')
                                loadTasks();


                            }
                            else
                            {
                                alert('error');
                            }
                        }
                    });
            });


        });

</script>
</body>
</html>