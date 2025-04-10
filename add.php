<?php
    $tarefas = [];
    $jsonFile = 'data/tarefas.json';

    // Verifica se o arquivo existe e contém um JSON válido
    if (file_exists($jsonFile)) {
        $jsonContent = file_get_contents($jsonFile);
        $tarefas = json_decode($jsonContent, true);

        if ($tarefas === null && json_last_error() !== JSON_ERROR_NONE) {
            die('Erro ao decodificar o JSON: ' . json_last_error_msg());
        }
    }

    // Valida o campo 'tarefa'
    if (!isset($_POST['tarefa']) || empty(trim($_POST['tarefa']))) {
        die('Erro: Nenhuma tarefa foi enviada.');
    }

    // Criação das tarefas
    $tarefas[] = [
        'tarefa' => $_POST['tarefa'],
        'feita' => false
    ];

    // Verifica se o arquivo foi salvo corretamente
    if (file_put_contents($jsonFile, json_encode($tarefas, JSON_PRETTY_PRINT)) === false) {
        die('Erro ao salvar o arquivo JSON.');
    }

    // Redireciona de volta para o index.php
    header('Location: index.php');
    exit;