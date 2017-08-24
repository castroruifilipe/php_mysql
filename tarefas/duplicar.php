<?php

include "config.php";
include "basedados.php";
include "models/Tarefas.php";

$tarefas = new Tarefas($mysqli);

$tarefa = $tarefas->get_tarefa($_GET['id']);

$tarefas->put_tarefa($tarefa);

header('Location: tarefas.php');