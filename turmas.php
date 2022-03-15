<!DOCTYPE html>
<?php 

	include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

	session_start();
	if (!isset($_SESSION['id']))
  		header("location:login.php");

	if ($_SESSION['professor'] == 1)
		header('location:professor.php');


 ?>
<html>
<head>
	<meta charset="utf-8">
	<title>turmas</title>
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
				<a href="index.php" class="btn blue">Shows</a>
			</div>
		</div>
		
		<div class="row">
			<div class="col s12">
				<h3 class="center-align">Minha turmas</h3>
			</div>
		</div>

		<div class="row">
			<div class="col s12">
				<table class="striped responsive-table centered">
					<thead>
						<th>Código</th>
						<th>Preço</th>
						<th>Data de compra</th>
						<th>Código do curso</th>
					</thead>
					<tbody>
						<?php 
							$codigo = $_SESSION['id'];
							$sql = "SELECT * from turmas WHERE contas_id = '$codigo' ORDER BY id";
							$pdo = Conexao::getInstance(); 
    						$consulta = $pdo->query($sql);
							while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){ 
						        echo "<tr><td>{$linha['id']}</td>";
						        echo "<td>{$linha['preco']}</td>";
						        echo "<td>{$linha['data_compra']}</td>";
						        echo "<td>{$linha['cursos_id']}</td></tr>";
						    }
						 ?>
					</tbody>
				</table>
			</div>
		</div>

	</div>

</body>
</html>