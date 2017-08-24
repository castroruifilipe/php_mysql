<?php

include "config.php";
include "basedados.php";
include "models/Tarefas.php";

$tarefas = new Tarefas($mysqli);

$tarefas->remover_tarefas_concluidas();

header('Location: tarefas.php');