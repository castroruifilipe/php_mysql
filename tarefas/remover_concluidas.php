<?php

include "basedados.php";

remover_tarefas_concluidas($conexao);

header('Location: tarefas.php');