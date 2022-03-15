<?php 

   include_once "conf/default.inc.php";
   require_once "conf/Conexao.php";

   $pdo = Conexao::getInstance();
   $nome = $_POST['nome'];
   $email = $_POST['email'];
   $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
   $cpf = $_POST['cpf'];
   $professor = $_POST['professor'];
   $sql = 'INSERT INTO contas (nome, email, senha, cpf, professor) VALUES (:nome, :email, :senha, :cpf, :professor)';
   $stmt = $pdo->prepare($sql);
   $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
   $stmt->bindParam(':email', $email, PDO::PARAM_STR);
   $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
   $stmt->bindParam(':cpf', $cpf, PDO::PARAM_INT);
   $stmt->bindParam(':professor', $professor, PDO::PARAM_BOOL);
   $stmt->execute();
   header('location:login.php');

?>