<fieldset id="fie">
  <div align="center">
  <?php
	session_start();
	echo "Usuário Conectado: " . $_SESSION["login"] . "<br>";
	?>
    <legend></legend>
    <label></label>
	<label></label>
    <table width="41%" border="0" align="center">

      <tr>
        <?php
        require ('conect.php');

        $stmt = $pdo->query('select * from seubanco.usuario;');

		echo "<table border='1px'>";
		echo "<tr><th width='30px' align='center'>Id</th><th width='100px'>Usuário</th><th width='250px'>Senha</th><th width='100px'>Telefone</th><th width='100px'>Imagem</th><tr>";

        while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
			
			echo "<tr>";
			echo "<td align='center'>". $linha['id']."</td>";
			echo "<td>". $linha['nome']."</td>";
			echo "<td>". $linha['senha']."</td>";
			echo "<td>". $linha['telefone']."</td>";		
			// buscando a na pasta imagem
			if (empty($linha['imagem'])){
				$imagem = 'SemImagem.png';
			}else{
				$imagem = $linha['imagem'];
			}
			$id = base64_encode($linha['id']);
			echo "<td align='center'><img src='$imagem' width='50px' heigth='50px'></a>";
			
			
			echo "</tr>";
			
			echo "<img src='{$linha['imagem']}' width=25 height=25 /> ID: {$linha['id']} - Nome: {$linha['nome']} - Senha: {$linha['senha']} - Telefone: {$linha['telefone']} - Imagem: {$linha['imagem']} - Link:  {$linha['imagem']}<br />";
         
        }

        ?>

      </tr>
    </table>
  </div>
</fieldset>

<td> </td>

<form method="post" action="cad_user_del.php" id="formlogin" name="formlogin">
  <fieldset id="fie">
    <div align="center">
      <legend></legend>
      <label></label>
      <label></label>
      <table width="41%" border="0" align="center">
        <tr>
          <td width="29%"> </td>
          <td width="71%">
            <legend>Remover Usuário</legend>
          </td>
        </tr>
        <tr>
          <td>
            <div align="right">ID :</div>
          </td>
          <td><input type="text" name="id" id="id" /></td>
        </tr>
        <td> </td>
        <td><input name="submit" type="submit" value="Remover" /></td>
        </tr>
      </table>
    </div>
  </fieldset>
</form>
