<?php
require('conect.php');
$id = $_POST['id'];
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$senha = isset($_POST['senha']) ? $_POST['senha'] : null;
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
$imagem = isset($_POST['imagem']) ? $_POST['imagem'] : null;

try {
    // Prepara a consulta para atualizar apenas os campos que foram fornecidos
    $updateFields = [];
    $params = [':id' => $id];

    if ($nome) {
        $updateFields[] = 'nome = :nome';
        $params[':nome'] = $nome;
    }
    if ($senha) {
        $updateFields[] = 'senha = :senha';
        $params[':senha'] = md5($senha);
    }
    if ($telefone) {
        $updateFields[] = 'telefone = :telefone';
        $params[':telefone'] = $telefone;
    }
    if ($imagem) {
        $updateFields[] = 'imagem = :imagem';
        $params[':imagem'] = $imagem;
    }

    if (count($updateFields) > 0) {
        $stmt = $pdo->prepare('UPDATE seubanco.usuario SET ' . implode(', ', $updateFields) . ' WHERE id = :id');
        $stmt->execute($params);
        
        echo $stmt->rowCount();
        if ($stmt->rowCount() > 0) {
            header('Location: cad_user_upd_form.php');
            exit;
        }
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
