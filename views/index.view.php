<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1><?= $pageTitle ?></h1>
    <form class="form-inline" action="add" method="post">
        <div class="form-group">
            <label for="calculate">Введите свой пример:</label>
            <input type="text" name="calculate" placeholder="2+2">
            <button class="btn btn-success">Посчитать</button>
            <br><br>
        </div>
    </form>
    <ul class="list-group col-md-6">
    <?php foreach($examplesList as $example): ?>
                  <li class="list-group-item"><?= $example['examples'] ?></li>
    <?php endforeach; ?>
    </ul>
</div>
</body>
</html>