<?php
// Pega o id da tarefa
$id = $_GET['id'] ?: -1;
$tarefas = json_decode(file_get_contents('data/tarefas.json'), true);

// Se a tarefa existir marcamos como feita
if (isset($tarefas[$id])) {
    $tarefas[$id]['feita'] = true;
}

file_put_contents('data/tarefas.json', json_encode($tarefas, JSON_PRETTY_PRINT));
header("Location: index.php");
