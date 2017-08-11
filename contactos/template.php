<html>
    <head>
        <meta charset="utf-8"/>
        <title>Gestor de Contactos</title>
        <link rel="stylesheet" href="contactos.css" type="text/css"/>
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
                <label>
                    Favorito:
                    <input type="checkbox" name="favorito" value="sim"/>
                </label>
                <input type="submit" value="Registar"/>
            </fieldset>
        </form>
        <table>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Favorito</th>
            </tr>
            <?php foreach ($lista_contactos as $contacto) : ?>
                <tr>
                    <td><?php echo $contacto['nome']; ?></td>
                    <td><?php echo $contacto['telefone']; ?></td>
                    <td><?php echo $contacto['email']; ?></td>
                    <td><?php echo $contacto['favorito']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>