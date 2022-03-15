<!DOCTYPE html>
<?php 

	include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

	session_start();
	if (!isset($_SESSION['id']))
  		header("location:login.php");

	if ($_SESSION['professor'] != 1)
		header('location:professor.php');

	$acao = isset($_GET['acao']) ? $_GET['acao'] : 'adicionar';
    $id = isset($_GET['id']) ? $_GET['id'] : '';

    if ($acao == 'editar') {
    	$pdo = Conexao::getInstance();
    	$consulta = $pdo->query("SELECT * FROM cursos WHERE id = '$id'");
    	while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    		$descricao = $linha['descricao'];
   			$qnt_turmas = $linha['qnt_turmas'];
   			$data = $linha['data'];
   			$local = $linha['local'];
        	$preco = $linha['preco'];
        }
    } else {
    	$descricao = '';
   		$qnt_turmas = '';
   		$data = '';
   		$local = '';
        $preco = '';
    }

 ?>
<html>
<head>
	<meta charset="utf-8">
	<title>Cad Curso</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>

	<?php include_once 'navbar.php'; ?>
	<br>
	<div class="container">

		<div class="row">
			<div class="col s3">
			    <a href="acaoLogin.php?acao=logoff" class="btn grey">Deslogar</a>
			</div>
			<div class="col s3">
				<a href="organizador.php" class="btn blue">Organizador</a>
			</div>
		</div>
		
		<div class="row">
			<div class="col s12">
				<h3 class="center-align">Adicionar Show</h3>
			</div>
		</div>

		<div class="row">
			<form class="col s12" <?php echo 'action="acao.php?acao='.$acao.'&id='.$id.'"'; ?> method="post">
			    <div class="row">
			        <div class="input-field col s6 offset-s3">
			        	<input id="descricao" name="descricao" type="text" class="validate" required="true" <?php echo 'value="'.$descricao.'"'; ?>>
			        	<label for="descricao">Descrição</label>
			        </div>
			    </div>
			    <div class="row">
			        <div class="input-field col s6 offset-s3">
			        	<input id="qnt_turmas" name="qnt_turmas" type="number" class="validate" required="true" <?php echo 'value="'.$qnt_turmas.'"'; ?>>
			        	<label for="qnt_turmas">Quantidade de turmas</label>
			        </div>
			    </div>
			    <div class="row">
			        <div class="input-field col s6 offset-s3">
			        	<input id="data" name="data" type="datetime-local" class="validate" required="true" <?php echo 'value="'.$data.'"'; ?>>
			        </div>
			    </div>
			    <div class="row">
			        <div class="input-field col s6 offset-s3">
			        	<input id="local" name="local" type="text" class="validate" required="true" <?php echo 'value="'.$local.'"'; ?>>
			        	<label for="local">Local</label>
			        </div>
			    </div>
			    <div class="row">
			        <div class="input-field col s6 offset-s3">
			        	<input id="preco" name="preco" type="text" class="validate" required="true" <?php echo 'value="'.$preco.'"'; ?>>
			        	<label for="preco">Preço</label>
			        </div>
			    </div>
			    <div class="row">
			    	<div class="col s2 offset-s3">
			    		<button type="submit" class="btn green">Adicionar</button>
			    	</div>
			    </div>
			</form>
		</div>

	</div>

</body>
</html>