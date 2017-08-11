<?php

session_start();

include "basedados.php";
include "helpers.php";

if (isset($_GET['nome']) && $_GET['nome'] != '') {
    $tarefa = array();
    $tarefa['nome'] = $_GET['nome'];

    if (isset($_GET['descricao'])) {
        $tarefa['descricao'] = $_GET['descricao'];
    } else {
        $tarefa['descricao'] = '';
    }

    if (isset($_GET['prazo'])) {
        $tarefa['prazo'] = traduz_data_para_basedados($_GET['prazo']);
    } else {
        $tarefa['prazo'] = '';
    }

    $tarefa['prioridade'] = $_GET['prioridade'];

    if (isset($_GET['concluida'])) {
        $tarefa['concluida'] = $_GET['concluida'];
    } else {
        $tarefa['concluida'] = '';
    }

    put_tarefa($conexao, $tarefa);
}

$lista_tarefas = get_tarefas($conexao);

include "template.php";