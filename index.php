<?php
    $tarefas = json_decode(file_get_contents('data/tarefas.json'), true);
    ?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My todoList</title>
</head>
<body>
    <h1>Lista de tarefas eeee!!!</h1>
    <form action="add.php" method="POST">
        <input type="text" name="tarefa" placeholder="tarefa">
        <button type="submit">Adicionar Tarefa</button>
    </form>

    <ul>

        <?php if ($tarefas != null): ?>
            <?php foreach ($tarefas as $i => $tarefa): ?>
                    <li>
                        <?= $tarefa['tarefa'] ?>
                        <?= $tarefa['feita'] ? '(feita)' : '' ?>
                        <a href="done.php?id=<?= $i ?>">[Marcar como feita]</a>
                        <a href="delete.php?id=<?= $i ?>">[Remover]</a>
                    </li>
            <?php endforeach; ?>
        <?php else: ?>
            <h2><b>Não há tarefas!</b></h2>
        <?php endif; ?>
    </ul>

</body>
</html>
