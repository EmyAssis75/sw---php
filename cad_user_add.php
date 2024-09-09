<?php
require('conect.php');
try {
    $stmt = $pdo->prepare('INSERT INTO seubanco.usuario (`nome`,`senha`,`telefone`,`imagem` ) VALUES (:nome,:senha,:telefone,:imagem)');
    $stmt->execute(array(
        ':nome' => $nome,
        ':senha' => md5($senha),
        ':telefone' => $telefone,
        ':imagem' => $imagem

    ));

} catch (PDOException $e) {
    echo 'Erro:' . $e->getMessage();
}
?>
