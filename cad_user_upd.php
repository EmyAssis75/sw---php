<?php
    require('conect.php');
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $imagem = $_POST['imagem'];
    
 try{   
    $stmt = $pdo->prepare('UPDATE seubanco.usuario SET nome = :nome , senha = :senha, telefone = :telefone, imagem = :imagem  WHERE id = :id');
   
    $stmt->execute(array(
        ':id' => $id,
        ':nome'=> $nome,
        ':senha'=>md5($senha),
        ':telefone'=> $telefone,
        ':imagem'=> $imagem
        
    ));
    echo $stmt->rowCount();
    if($stmt->rowCount() > 0){
       // $_SESSION['login'] = $login;
       // $_SESSION['senha'] = $senha;
        header('location:cad_user_upd_form.php');
    }else{
       // unset($_SESSION['login']);
       // unset($_SESSION['senha']);
       // header('location:index.php');
    }
 }catch(PDOException $e){
    echo 'Error: '. $e->getMessage();
 }
?>
