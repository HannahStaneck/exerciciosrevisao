<!DOCTYPE html>
<?php 

	include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

	session_start();
	if (!isset($_SESSION['id']))
  		header("location:login.php");

	if ($_SESSION['professor'] != 1)
		header('location:index.php');

	$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : "1";
    $procurar = isset($_POST['procurar']) ? $_POST['procurar'] : "";

 ?>
<html>
<head>
	<meta charset="utf-8">
	<title>Organizador</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script>
        function excluirRegistro(url) {
            if (confirm("Confirmar Exclusão?"))
                location.href = url; 
        }
    </script>
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
				<a href="cadcurso.php" class="btn green">Adicionar </a>
			</div>
		</div>
		
		<div class="row">
			<div class="col s12">
				<h3 class="center-align">Organizador</h3>
			</div>
		</div>

		
		<div class="row">
			<div class="col s12">
				<table class="striped responsive-table centered">
					<thead>
						<th>Código</th>
						<th>Descrição</th>
						<th>Quantidade de turmas</th>
						<th>Data</th>
						<th>Local</th>
						<th>Preço</th>
						<th>Editar</th>
						<th>Excluir</th>
					</thead>
					<tbody>
						<?php 
							$codigo = $_SESSION['id'];
							$sql = "SELECT * from cursos ORDER BY id";
							$pdo = Conexao::getInstance(); 
    						$consulta = $pdo->query($sql);
							while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){ 
						        echo "<tr><td>{$linha['id']}</td>";
						        echo "<td>{$linha['descricao']}</td>";
						        echo "<td>{$linha['qnt_turmas']}</td>";
						        echo "<td>{$linha['data']}</td>";
						        echo "<td>{$linha['local']}</td>";
						        echo "<td>{$linha['preco']}</td>";
						        echo "<td><a href='cadcurso.php?acao=editar&id={$linha['id']}' class='btn blue'>Editar</a></td>";
						        echo "<td><a href='javascript:excluirRegistro(`acao.php?acao=excluir&id={$linha['id']}`)' class='btn red'>Excluir</a></td> </tr>";
						    }
						 ?>
					</tbody>
				</table>
			</div>
		</div>

	</div>

</body>
</html>