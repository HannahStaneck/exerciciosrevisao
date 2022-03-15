<?php 

	include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
    $id = isset($_GET['id']) ? $_GET['id'] : '';

    if ($acao == 'comprar') {
    	comprar($id);
    } else if ($acao == 'adicionar') {
    	adicionarcursos();
    } else if ($acao == 'editar') {
    	editarcursosadicionarcursos($id);
    } else if ($acao == 'excluir') {
    	excluircursos($id);
    }

    function comprar($id) {
    	session_start();
    	$pdo = Conexao::getInstance();
    	$consulta = $pdo->query("SELECT * FROM cursos WHERE id = '$id'");
    	while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        	$preco = $linha['preco'];
        	$qnt_turmas = $linha['qnt_turmas'];  
        }
        $qnt_turmas -= 1;
    	$sql = 'INSERT INTO turmas (preco, data_compra, contas_id, cursos_id) VALUES (:preco, CURRENT_DATE(), :contas_id, :cursos_id)';
		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':preco', $preco, PDO::PARAM_STR);
		$stmt->bindParam(':contas_id', $_SESSION['id'], PDO::PARAM_STR);
	 	$stmt->bindParam(':cursos_id', $id, PDO::PARAM_STR);
		$stmt->execute();
		$sql = "UPDATE cursos SET qnt_turmas='$qnt_turmas' WHERE id = '$id'";
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		header('location:turmas.php');
    }

    function adicionarcursos() {
    	$pdo = Conexao::getInstance();
    	$sql = 'INSERT INTO cursos (descricao, qnt_turmas, data, local, preco) VALUES (:descricao, :qnt_turmas, :data, :local, :preco)';
    	$stmt = $pdo->prepare($sql);
    	$stmt->bindParam(':descricao', $_POST['descricao'], PDO::PARAM_STR);
    	$stmt->bindParam(':qnt_turmas', $_POST['qnt_turmas'], PDO::PARAM_STR);
    	$stmt->bindParam(':data', $_POST['data'], PDO::PARAM_STR);
    	$stmt->bindParam(':local', $_POST['local'], PDO::PARAM_STR);
    	$stmt->bindParam(':preco', $_POST['preco'], PDO::PARAM_STR);
    	$stmt->execute();
    	header('location:professor.php');
    }

    function editarcursosadicionarcursos($id) {
    	$pdo = Conexao::getInstance();
    	$descricao = $_POST['descricao'];
    	$qnt_turmas = $_POST['qnt_turmas'];
    	$data = $_POST['data'];
    	$local = $_POST['local'];
    	$preco = $_POST['preco'];
    	$sql = "UPDATE cursos SET descricao='$descricao', qnt_turmas='$qnt_turmas', local='$local', preco='$preco' WHERE id = '$id'";
    	$stmt = $pdo->prepare($sql);
    	$stmt->execute();
    	header('location:professor.php');
    }

    function excluircursos($id) {
    	$pdo = Conexao::getInstance();
		$stmt = $pdo ->prepare('DELETE from cursos WHERE id = :id');
    	$stmt-> bindParam (':id',$id,  PDO::PARAM_INT);
		$id = $id;
    	$stmt->execute();
    	header('location:professor.php');


    }

 ?>