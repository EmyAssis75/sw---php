<?php
require('conect.php');
$id = $_POST['id'];
try {
    $stmt = $pdo->prepare('DELETE FROM seubanco.usuario WHERE id = :id');
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    echo $stmt->rowCount();
    echo 'Usuário removido com sucesso!';
    if($stmt->rowCount() > 0){
    //    $_SESSION['login'] = $login;
    //    $_SESSION['senha'] = $senha;
        header('location:cad_user_del_form.php');
    }else{
    //    unset($_SESSION['login']);
    //    unset($_SESSION['senha']);
    //    header('location:index.php');
    }
 }catch (PDOException $e){
    echo 'Erro :' . $e->getMessage();
}
?>
