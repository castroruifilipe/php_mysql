<?php

$mysqli = new mysqli(BD_SERVIDOR, BD_USER, BD_PASSWORD, BD_BASEDADOS);

if ($mysqli->connect_errno) {
    echo "Problemas na conexão à base de dados.";
    die();
}