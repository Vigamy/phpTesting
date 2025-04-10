<?php
$id = isset($_GET['id']) ? $_GET['id'] : -1;

// Carrega o arquivo de tarefas e decodifica
$tarefas = json_decode(file_get_contents('data/tarefas.json'), true);

// Remove a tarefa, se existir
if (isset($tarefas[$id])) {
    array_splice($tarefas, $id, 1);
}

// Salva o JSON atualizado no arquivo
file_put_contents('data/tarefas.json', json_encode($tarefas, JSON_PRETTY_PRINT));

// Redireciona de volta para a lista
header('Location: index.php');
exit;
