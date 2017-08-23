<?php

include "config.php";
include "basedados.php";
include "helpers.php";

$tem_erros = false;
$erros_validacao = array();

if (tem_post()) {
    $tarefa_id = $_POST['tarefa_id'];

    if (isset($_FILES['anexo'])) {
        if (tratar_anexo($_FILES['anexo'])) {
            $anexo = array();
            $anexo['tarefa_id'] = $tarefa_id;
            $anexo['nome'] = $_FILES['anexo']['name'];
            $anexo['ficheiro'] = $_FILES['anexo']['name'];
        } else {
            $tem_erros = true;
            $erros_validacao['anexo'] = 'Envie anexos nos formatos zip ou pdf';
        }
    } else {
        $tem_erros = true;
        $erros_validacao['anexo'] = "Deverá selecionar um ficheiro";
    }

    if (!$tem_erros) {
        put_anexo($conexao, $anexo);
    }
}

$tarefa = get_tarefa($conexao, $_GET['id']);
$anexos = get_anexos($conexao, $_GET['id']);

include "template_tarefa.php";