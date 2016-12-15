<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>ToDo List</h2>
    <form class="form-inline" action="/task/add" method="post">
        <div class="form-group">
            <input name="task" type="text" class="form-control" id="task" placeholder="Задача">
        </div>
        <button type="submit" class="btn btn-default">Добавить задачу</button>
    </form>
    <hr>
    <form action="/task/update" method="POST">
        <div class="col-md-3">
            <select name="act" class="form-control">
                <option value=""></option>
                <option value="d">Удалить</option>
                <option value="u">Пометить как сделано</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>


    <?php foreach($taskList as $task): ?>
        <?php if($task['complete']): ?>
            <div class = 'checkbox'>
                <label>
                    <input type="checkbox" name="complete[]" value="<?=$task['id']?>">
                    <s><?= $task['title'] ?></s>
                </label>
            </div>
        <?php else: ?>
            <div class = 'checkbox'>
                <label>
                    <input type="checkbox" name="complete[]" value="<?=$task['id']?>">
                    <?= $task['title'] ?>
                </label>
            </div>
        <?php endif ?>
    <?php endforeach; ?>
    </form>
</div>
</body>
</html>