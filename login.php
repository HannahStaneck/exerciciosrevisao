<!DOCTYPE html>
<?php 

	session_start();
    if (isset($_SESSION['id']))
        header("location:index.php");

    $msg = isset($_GET['msg']) ? $_GET['msg'] : '';

 ?>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>

	<?php include_once 'navbar.php'; ?>
	<br>
	<div class="container">
		
		<div class="row">
			<div class="col s12">
				<h3 class="center-align">Login</h3>
			</div>
		</div>

		<div class="row">
			<form class="col s12" action="acaoLogin.php" method="post">
			    <div class="row">
			        <div class="input-field col s6 offset-s3">
			        	<input id="email" name="email" type="email" class="validate" required="true">
			        	<label for="email">E-mail</label>
			        </div>
			    </div>
			    <div class="row">
			        <div class="input-field col s6 offset-s3">
			        	<input id="senha" name="senha" type="password" class="validate" required="true">
			        	<label for="senha">Senha</label>
			        </div>
			    </div>
			    <div class="row">
			    	<div class="col s2 offset-s3">
			    		<button type="submit" class="btn blue" name="acao" value="login">Login</button>
			    	</div>
			    	<div class="col s2 offset-s2">
			    		<a href="registro.php" class="btn green">Cadastre-se</a>
			    	</div>
			    </div>
			    <div class="row">
			    	<div class="col s6 offset-s3">
			    		<h4 class="red-text"><?php echo $msg; ?></h4>
			    	</div>
			    </div>
			</form>
		</div>

	</div>

</body>
</html>