<?php

include "basedados.php";

$tarefa = get_tarefa($conexao, $_GET['id']);

put_tarefa($conexao, $tarefa);

header('Location: tarefas.php');