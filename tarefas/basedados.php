<?php

$bdServidor = '127.0.0.1';
$bdUser = 'gestor';
$bdPassword = '';
$bdBaseDados = 'tarefas';

$conexao = mysqli_connect($bdServidor, $bdUser, $bdPassword, $bdBaseDados);

if (mysqli_connect_errno($conexao)) {
    echo "Problemas na conexão à base de dados.";
    die();
}

function get_tarefas($conexao) {
    $sqlSelect = 'SELECT * FROM Tarefas';
    $resultado = mysqli_query($conexao, $sqlSelect);

    $tarefas = array();
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        $tarefas[] = $tarefa;
    }

    return $tarefas;
}

function put_tarefa($conexao, $tarefa) {
    $sqlGravar = "
        INSERT INTO Tarefas (nome, descricao, prioridade, prazo)
        VALUES ('{$tarefa['nome']}', '{$tarefa['descricao']}', {$tarefa['prioridade']}, '{$tarefa['prazo']}')
    ";

    mysqli_query($conexao, $sqlGravar);
}