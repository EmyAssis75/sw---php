<fieldset id="fie">
    <div style="text-align: center;">
        <?php
        session_start();
        echo "Usuário Conectado: " . htmlspecialchars($_SESSION["login"]) . "<br>";
        ?>
        <legend>Lista de Usuários</legend>
        <table border="1" style="margin: 0 auto;">
            <tr>
                <th width="30px">Id</th>
                <th width="100px">Usuário</th>
                <th width="100px">Telefone</th>
                <th width="100px">Imagem</th>
            </tr>
            <?php
            require('conect.php');
            $stmt = $pdo->query('SELECT * FROM seubanco.usuario;');

            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $imagem = empty($linha['imagem']) ? 'SemImagem.png' : htmlspecialchars($linha['imagem']);
                echo "<tr>
                        <td align='center'>" . htmlspecialchars($linha['id']) . "</td>
                        <td>" . htmlspecialchars($linha['nome']) . "</td>
                        <td>" . htmlspecialchars($linha['telefone']) . "</td>
                        <td align='center'><img src='$imagem' width='50' height='50'></td>
                      </tr>";
            }
            ?>
        </table>
    </div>
</fieldset>

<form method="post" action="cad_user_upd.php" id="formlogin">
    <fieldset id="fie">
        <div style="text-align: center;">
            <legend>Alterar Usuário</legend>
            <table style="margin: 0 auto;">
                <tr>
                    <td><label for="id">ID:</label></td>
                    <td><input type="text" name="id" id="id" required /></td>
                </tr>
                <tr>
                    <td><label for="nome">NOME:</label></td>
                    <td><input type="text" name="nome" id="nome" /></td>
                </tr>
                <tr>
                    <td><label for="senha">SENHA:</label></td>
                    <td><input type="password" name="senha" id="senha" /></td>
                </tr>
                <tr>
                    <td><label for="telefone">TELEFONE:</label></td>
                    <td><input type="text" name="telefone" id="telefone" /></td>
                </tr>
                <tr>
                    <td><label for="imagem">IMAGEM:</label></td>
                    <td><input type="text" name="imagem" id="imagem" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input name="submit" type="submit" value="Alterar" /></td>
                </tr>
            </table>
        </div>
    </fieldset>
</form>
