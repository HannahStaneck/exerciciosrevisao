<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>

	<?php include_once 'navbar.php'; ?>
	<br>
	<div class="container">

		<div class="row">
			<div class="col s3">
			    <a href="login.php" class="btn grey">Voltar</a>
			</div>
		</div>
		
		<div class="row">
			<div class="col s12">
				<h3 class="center-align">Registro</h3>
			</div>
		</div>

		<div class="row">
			<form class="col s12" action="acaoRegistro.php" method="post">
				<div class="row">
			        <div class="input-field col s6 offset-s3">
			        	<input id="nome" name="nome" type="text" class="validate" required="true">
			        	<label for="nome">Nome</label>
			        </div>
			    </div>
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
			        <div class="input-field col s6 offset-s3">
			        	<input id="cpf" name="cpf" type="number" class="validate" required="true">
			        	<label for="cpf">CPF</label>
			        </div>
			    </div>
			    <div class="row">
			    	<div class="col s3 offset-s3">
			    		<p>
			    			<label>
			    				<input type="radio" name="professor" value="0" checked>
			    				<span>Aluno</span>
			    			</label>
			    		</p>
			    	</div>
			    	<div class="col s3">
			    		<p>
			    			<label>
			    				<input type="radio" name="professor" value="1">
			    				<span>Professor</span>
			    			</label>
			    		</p>
			    	</div>
			    </div>
			    <div class="row">
			    	<div class="col s2 offset-s3">
			    		<button type="submit" class="btn green">Cadastrar</button>
			    	</div>
			    </div>
			</form>
		</div>

	</div>

</body>
</html>