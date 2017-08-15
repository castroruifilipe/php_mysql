<?php

include "basedados.php";

remover_tarefa($conexao, $_GET['id']);

header('Location: tarefas.php');