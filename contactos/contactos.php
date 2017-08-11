<?php

session_start();
   
if (isset($_GET['nome']) && $_GET['nome'] != '') {
    $infos = array();
    $infos['nome'] = $_GET['nome'];

    if (isset($_GET['telefone'])) {
        $infos['telefone'] = $_GET['telefone'];
    } else {
        $infos['telefone'] = '';
    }

    if (isset($_GET['email'])) {
        $infos['email'] = $_GET['email'];
    } else {
        $infos['email'] = '';
    }

    if (isset($_GET['favorito'])) {
        $infos['favorito'] = $_GET['favorito'];
    } else {
        $infos['favorito'] = '';
    }

    
    $_SESSION['lista_contactos'][] = $infos;
}

if (isset($_SESSION['lista_contactos'])) {
    $lista_contactos = $_SESSION['lista_contactos'];
} else {
    $lista_contactos = array();
}

include "template.php";