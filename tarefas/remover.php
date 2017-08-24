<?php

include "config.php";
include "basedados.php";
include "models/Tarefas.php";

$tarefas = new Tarefas($mysqli);

$tarefas->remover_tarefa($_GET['id']);

header('Location: tarefas.php');