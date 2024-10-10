<?php
session_start();
require('conect.php');
if (isset($_SESSION["login"])) {
    echo "Usuário Conectado: " . htmlspecialchars($_SESSION["login"]) . "<br>";
}

$stmt = $pdo->query('SELECT * FROM b14_37100422_php.usuario ORDER BY id ASC');
?>

<fieldset id="fie">
    <div style="text-align: center;">
        <legend>Lista de Usuários</legend>
        <table border="1" style="margin: 0 auto;">
            <tr>
                <th width="30px">Id</th>
                <th width="100px">Usuário</th>
                <th width="100px">Telefone</th>
                <th width="100px">Imagem</th>
            </tr>
            <?php while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td align='center'><?= htmlspecialchars($linha['id']) ?></td>
                    <td><?= htmlspecialchars($linha['nome']) ?></td>
                    <td><?= htmlspecialchars($linha['telefone']) ?></td>
                    <td align='center'>
                        <img src="<?= empty($linha['imagem']) ? 'SemImagem.png' : htmlspecialchars($linha['imagem']) ?>" width="50" height="50">
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</fieldset>

<form method="post" action="cad_user_add.php" id="formlogin">
    <fieldset id="fie">
        <div style="text-align: center;">
            <legend>Cadastro Usuário</legend>
            <table style="margin: 0 auto;">
                <tr>
                    <td><label for="nome">NOME:</label></td>
                    <td><input type="text" name="nome" id="nome" required /></td>
                </tr>
                <tr>
                    <td><label for="senha">SENHA:</label></td>
                    <td><input type="password" name="senha" id="senha" required /></td>
                </tr>
                <tr>
                    <td><label for="telefone">TELEFONE:</label></td>
                    <td><input type="text" name="telefone" id="telefone" required /></td>
                </tr>
                <tr>
                    <td><label for="imagem">IMAGEM:</label></td>
                    <td><input type="text" name="imagem" id="imagem" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input name="submit" type="submit" value="Criar" /></td>
                </tr>
            </table>
        </div>
    </fieldset>
</form>
