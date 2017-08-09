<?php session_start(); ?>
<html>
    <head>
        <title>Gestor de Tarefas</title>
        <style>
            <?php include('tarefas.css');?>
        </style>
    </head>
    <body>
        <h1>Gestor de Tarefas</h1>
        <form>
            <fieldset>
                <legend>Nova tarefa</legend>
                <label>
                    Tarefa:
                    <input type="text" name="nome"/>
                </label>
                <input type="submit" value="Registar"/>
            </fieldset>
        </form>
        <?php
            if (isset($_GET['nome'])) {
                $_SESSION['lista_tarefas'][] = $_GET['nome'];
            }

            $lista_tarefas = array();
            if (isset($_SESSION['lista_tarefas'])) {
                $lista_tarefas = $_SESSION['lista_tarefas'];
            }
        ?>
        <table>
            <tr>
                <th>Tarefas</th>
            </tr>

            <?php foreach ($lista_tarefas as $tarefa) : ?>
                <tr>
                    <td><?php echo $tarefa; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>