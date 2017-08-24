<?php

include "config.php";
include "basedados.php";
include "models/Tarefas.php";

$tarefas = new Tarefas($mysqli);

$tarefas->get_tarefa($_GET['id']);
$tarefa = $tarefas->tarefa;

$tarefas->put_tarefa($tarefa);

header('Location: tarefas.php');