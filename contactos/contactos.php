<?php session_start(); ?>
<html>
    <head>
        <title>Gestor de Contactos</title>
        <style>
            <?php include('contactos.css');?>
        </style>
    </head>
    <body>
        <h1>Gestor de Contactos</h1>
        <form>
            <fieldset>
                <legend>Novo contacto</legend>
                <label>
                    Nome:
                    <input type="text" name="nome"/>
                </label>
                <label>
                    Telefone:
                    <input type="tel" name="telefone"/>
                </label>
                <label>
                    Email:
                    <input type="email" name="email"/>
                </label>
                <input type="submit" value="Registar"/>
            </fieldset>
        </form>
        <?php
            $infos = array();
            if (isset($_GET['nome'])) {
                $infos['nome'] = $_GET['nome'];
            }
            if (isset($_GET['telefone'])) {
                $infos['telefone'] = $_GET['telefone'];
            }
            if (isset($_GET['email'])) {
                $infos['email'] = $_GET['email'];
            }
            $_SESSION['lista_contactos'][] = $infos;

            $lista_contactos = array();
            if (isset($_SESSION['lista_contactos'])) {
                $lista_contactos = $_SESSION['lista_contactos'];
            }
        ?>
        <table>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
            </tr>

            <?php foreach ($lista_contactos as $contacto) : ?>
                <?php if (isset($contacto['nome']) && isset($contacto['telefone']) && isset($contacto['email'])) : ?>
                    <tr>
                        <td><?php echo $contacto['nome']; ?></td>
                        <td><?php echo $contacto['telefone']; ?></td>
                        <td><?php echo $contacto['email']; ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
    </body>
</html>