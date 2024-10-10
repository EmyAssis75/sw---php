<fieldset id="fie">
  <div align="center">
    <?php
    session_start();
    echo "Usuário Conectado: " . htmlspecialchars($_SESSION["login"]) . "<br>";
    ?>
    <legend></legend>
    <label></label>
    <label></label>
    <table width="41%" border="0" align="center">
      <tr>
        <?php
        require('conect.php');

        $stmt = $pdo->query('SELECT * FROM seubanco.usuario;');

        echo "<table border='1px'>";
        echo "<tr><th width='30px' align='center'>Id</th><th width='100px'>Usuário</th><th width='100px'>Telefone</th><th width='100px'>Imagem</th></tr>";

        while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td align='center'>" . htmlspecialchars($linha['id']) . "</td>";
            echo "<td>" . htmlspecialchars($linha['nome']) . "</td>";
            echo "<td>" . htmlspecialchars($linha['telefone']) . "</td>";

            // Definindo imagem padrão
            $imagem = empty($linha['imagem']) ? 'SemImagem.png' : htmlspecialchars($linha['imagem']);
            echo "<td align='center'><img src='$imagem' width='50px' height='50px'></td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
      </tr>
    </table>
  </div>
</fieldset>

<form method="post" action="cad_user_del.php" id="formlogin" name="formlogin">
  <fieldset id="fie">
    <div align="center">
      <legend>Remover Usuário</legend>
      <table width="41%" border="0" align="center">
        <tr>
          <td align="right">ID:</td>
          <td><input type="text" name="id" id="id" placeholder="Digite o ID do usuário" required /></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input name="submit" type="submit" value="Remover" /></td>
        </tr>
      </table>
    </div>
  </fieldset>
</form>

<?php
// Mensagens de erro ou sucesso
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        // Validação do ID
        if (!empty($id) && is_numeric($id)) {
    		}
	}
}	    
?>
