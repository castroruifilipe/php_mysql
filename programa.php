<?php
echo "Hoje é " . date('l d/m/Y');
echo " e agora são " . date('H:i:s') . ". ";

$nextSaturday = strtotime('next saturday');
$now = time();
$difference = $nextSaturday - $now;
$days = ceil($difference / (60*60*24));
echo "Faltam " . $days . " dias para o próximo sábado. ";

echo "Estamos no mês de " . date('F') . ". ";

