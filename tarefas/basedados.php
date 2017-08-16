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

function get_tarefa($conexao, $id) {
    $sqlSelect = 'SELECT * FROM Tarefas WHERE id = ' . $id;
    $resultado = mysqli_query($conexao, $sqlSelect);
    return mysqli_fetch_assoc($resultado);
}

function put_tarefa($conexao, $tarefa) {
    $sqlGravar = "
        INSERT INTO Tarefas (nome, descricao, prioridade, prazo, concluida)
        VALUES ('{$tarefa['nome']}', '{$tarefa['descricao']}', {$tarefa['prioridade']}, '{$tarefa['prazo']}', {$tarefa['concluida']})
    ";

    mysqli_query($conexao, $sqlGravar);
}

function editar_tarefa($conexao, $tarefa) {
    $sql = "UPDATE Tarefas SET
                nome = '{$tarefa['nome']}',
                descricao = '{$tarefa['descricao']}',
                prioridade = {$tarefa['prioridade']},
                prazo = '{$tarefa['prazo']}',
                concluida = {$tarefa['concluida']}
            WHERE id = {$tarefa['id']}
    ";

    mysqli_query($conexao, $sql);
}

function remover_tarefa($conexao, $id) {
    $sqlRemove = "DELETE FROM Tarefas WHERE id = {$id}";

    mysqli_query($conexao, $sqlRemove);
}

function remover_tarefas_concluidas($conexao) {
    $sqlRemove = "DELETE FROM Tarefas WHERE concluida = 1";

    mysqli_query($conexao, $sqlRemove);
}

function put_anexo($conexao, $anexo) {
    $sqlInsert = "INSERT INTO Anexos (tarefa, nome, ficheiro)
                  VALUES ({$anexo['tarefa_id']},
                          '{$anexo['nome']}',
                          '{$anexo['ficheiro']}'
                          )
    ";
    mysqli_query($conexao, $sqlInsert);
}

function get_anexos($conexao, $tarefa_id) {
    $sql = "SELECT * FROM Anexos
            WHERE tarefa = {$tarefa_id}
    ";
    $resultado = mysqli_query($conexao, $sql);

    $anexos = array();
    while ($anexo = mysqli_fetch_assoc($resultado)) {
        $anexos[] = $anexo;
    }

    return $anexos;
}