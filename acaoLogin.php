<?php

    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "logoff"){
      session_start();
      session_destroy();
      header("location:login.php"); 
   }

    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "login"){
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $senha = isset($_POST['senha']) ? $_POST['senha'] : "";
        login($email, $senha);
    }

    function login($email, $senha){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM contas WHERE email = '$email'");
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $id = $linha['id'];
            $nome = $linha['nome'];
            $senha_bd = $linha['senha'];
            $professor = $linha['professor'];
        }
        if (password_verify($senha, $senha_bd)) {
            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['nome'] = $nome;
            $_SESSION['professor'] = $professor;
            header("location:index.php");
        } else 
            header("location:login.php?msg=Login Incorreto!");
    }

?>