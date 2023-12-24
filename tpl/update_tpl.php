<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update task</title>
    <link rel="stylesheet" href="assets/css/update_style.css">
</head>
<body>
    <form action="update.php?update_task=<?= $_GET['update_task'] ?>" method="post" >
        <input type="text" name="upTitle" value="<?= $task_data->title ?? '' ?>" class="inp_up">
        <input type="submit" name="send" class="btn_up">
    </form>
</body>
</html>