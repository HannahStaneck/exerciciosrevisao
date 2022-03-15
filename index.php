<!DOCTYPE html>
<?php 

	include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

	session_start();
	if (!isset($_SESSION['id']))
  		header("location:login.php");

	if ($_SESSION['professor'] == 1)
		header('location:professor.php');

	$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : "1";
    $procurar = isset($_POST['procurar']) ? $_POST['procurar'] : "";

 ?>
<html>
<head>
	<meta charset="utf-8">
	<title>Cursos</title>
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
				<a href="turmas.php" class="btn blue">Minhas turmas</a>
			</div>
		</div>
		
		<div class="row">
			<div class="col s12">
				<h3 class="center-align">Cursos</h3>
			</div>
		</div>

		<div class="row">
			<form method="post">
				<div class="row">
					<div class="col s2">
						<p>
							<label>
								<input type="radio" name="tipo" value="1" <?php if ($tipo == 1) { echo "checked"; }?>>
								<span>Código</span>
							</label>
						</p>
					</div>
					<div class="col s2">
						<p>
							<label>
								<input type="radio" name="tipo" value="2" <?php if ($tipo == 2) { echo "checked"; }?>>
								<span>Descrição</span>
							</label>
						</p>
					</div>
					<div class="col s2">
						<p>
							<label>
								<input type="radio" name="tipo" value="3" <?php if ($tipo == 3) { echo "checked"; }?>>
								<span>Data</span>
							</label>
						</p>
					</div>
					<div class="col s2">
						<p>
							<label>
								<input type="radio" name="tipo" value="4" <?php if ($tipo == 4) { echo "checked"; }?>>
								<span>Local</span>
							</label>
						</p>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						<input id="procurar" name="procurar" type="text" <?php echo 'value="'.$procurar.'"'; ?>>
			        	<label for="procurar">Procura</label>
					</div>
				</div>
				<div class="row">
					<div class="col s6">
						<button class="btn" type="submit" name="action">Procurar</button>
					</div>
			</form>
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
						<th>Comprar</th>
					</thead>
					<tbody>
						<?php 
							$sql = "";
						    if ($tipo == 1){
						        if ($procurar != '') {
						            $sql = "SELECT * FROM Cursos WHERE id = '$procurar' AND qnt_turmas > 0 ORDER BY id";
						        } else {
						            $sql = "SELECT * FROM Cursos WHERE qnt_turmas > 0 ORDER BY id";
						        }
						    }else if ($tipo == 2){    
						        $sql = "SELECT * FROM Cursos WHERE descricao = '$procurar' AND qnt_turmas > 0 ORDER BY descricao";
						    } else if ($tipo == 3){
						    	$sql = "SELECT * FROM Cursos WHERE data LIKE '$procurar%' AND qnt_turmas > 0 ORDER BY data";
						    } else {
						    	$sql = "SELECT * FROM Cursos WHERE local LIKE '$procurar%' AND qnt_turmas > 0 ORDER BY local";
						    }
							$pdo = Conexao::getInstance(); 
    						$consulta = $pdo->query($sql);
							while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){ 
						        echo "<tr><td>{$linha['id']}</td>";
						        echo "<td>{$linha['descricao']}</td>";
						        echo "<td>{$linha['qnt_turmas']}</td>";
						        echo "<td>{$linha['data']}</td>";
						        echo "<td>{$linha['local']}</td>";
						        echo "<td>{$linha['preco']}</td>";
						        echo "<td><a href='acao.php?acao=comprar&id={$linha['id']}' class='btn blue'>Comprar</a></td> </tr>";
						    }
						 ?>
					</tbody>
				</table>
			</div>
		</div>

	</div>

</body>
</html>