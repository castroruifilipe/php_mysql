<?php
    function linha($semana, $mes) {
        $dia_hoje = date('d');
        $mes_atual = date('n');
        echo "<tr>";
        for ($i = 0; $i <= 6; $i++) {
            if (isset($semana[$i])) {
                if ($i == 6) {
                    if ($semana[$i] == $dia_hoje && $mes_atual == $mes) {
                        echo "<td style=\"color:orange\"><b>{$semana[$i]}</b></td>";
                    } else {
                        echo "<td style=\"color:orange\">{$semana[$i]}</td>";
                    }
                } else {
                    if ($i == 0) {
                        if ($semana[$i] == $dia_hoje && $mes_atual == $mes) {
                            echo "<td style=\"color:red\"><b>{$semana[$i]}</b></td>";
                        } else {
                            echo "<td style=\"color:red\">{$semana[$i]}</td>";
                        }
                    } else {
                        if ($semana[$i] == $dia_hoje && $mes_atual == $mes) {
                            echo "<td><b>{$semana[$i]}</b></td>";
                        } else {
                            echo "<td>{$semana[$i]}</td>";
                        }
                    }
                }
            } else {
                echo "<td></td>";
            }
        }
        echo "</tr>";
    }

    function calendario_anual() {
        echo "<h2>Janeiro</h2>";
        calendario_mensal(0, 31, 1);
        echo "<h2>Fevereiro</h2>";
        calendario_mensal(3, 28, 2);
        echo "<h2>Março</h2>";
        calendario_mensal(3, 31, 3);
        echo "<h2>Abril</h2>";
        calendario_mensal(6, 30, 4);
        echo "<h2>Maio</h2>";
        calendario_mensal(1, 31, 5);
        echo "<h2>Junho</h2>";
        calendario_mensal(4, 30, 6);
        echo "<h2>Julho</h2>";
        calendario_mensal(6, 31, 7);
        echo "<h2>Agosto</h2>";
        calendario_mensal(2, 31, 8);
        echo "<h2>Setembro</h2>";
        calendario_mensal(5, 30, 9);
        echo "<h2>Outubro</h2>";
        calendario_mensal(0, 31, 10);
        echo "<h2>Novembro</h2>";
        calendario_mensal(3, 30, 11);
        echo "<h2>Dezembro</h2>";
        calendario_mensal(5, 31, 12);
    }

    function calendario_mensal($indice, $ndias, $mes) {
        echo "
            <table border=\"1\">
                <tr>
                    <th>Dom</th>
                    <th>Seg</th>
                    <th>Ter</th>
                    <th>Qua</th>
                    <th>Qui</th>
                    <th>Sex</th>
                    <th>Sab</th>
                </tr>
            ";

        $dia = 1;
        $semana = array();

        while ($dia <= $ndias) {
            $semana[$indice++] = $dia++;

            if ($indice == 7) {
                linha($semana, $mes);
                $semana = array();
                $indice = 0;
            }
        }
        linha($semana, $mes);

        echo "</table>";
    }

    function saudacao() {
        $hour = date('H');
        $minutes = date('i');
        if ($hour >= 6 && $hour < 13) {
            $saud = "Bom dia";
        } else {
            if ($hour >= 13 && $hour < 20) {
                $saud = "Boa tarde";
            } else {
                $saud = "Boa noite";
            }
        }
        return $saud . ", são " . $hour . ":" . $minutes . " e este é o calendário!";

    }
?>

<html>
    <body>
    <h1><?php echo saudacao(); ?></h1>
    <?php calendario_anual(); ?>
    </body>
</html>