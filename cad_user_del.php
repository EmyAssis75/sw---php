<?php
session_start(); // Inicie a sessão
require('conect.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Validação do ID
    if (!filter_var($id, FILTER_VALIDATE_INT)) {
        echo 'ID inválido.';
        exit;
    }

    try {
        $stmt = $pdo->prepare('DELETE FROM seubanco.usuario WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo 'Usuário removido com sucesso!';
            header('Location: cad_user_del_form.php');
            exit; // Assegura que o script pare após o redirecionamento
        } else {
            echo 'Nenhum usuário encontrado com esse ID.';
            header('Location: index.php'); // Redirecionar se nenhum usuário foi encontrado
            exit;
        }
    } catch (PDOException $e) {
        echo 'Erro: ' . htmlspecialchars($e->getMessage());
    }
} else {
    echo 'ID não foi fornecido.';
}
?>
