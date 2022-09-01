<?php 
	// conexão
    require("bmqdb/connection.php");
	// funções
    require("functions/functions.php");
	// classes
    require_once("class/classes.php");
	
	// checa os dados enviados para o registro de um novo usuário.
	require("requires/checkregister.php");

    session_start();
    $Config = getConfig($conn);



?>

<!DOCTYPE html>
<html lang="PT-BR">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Cadastrar - <?php echo $Config->getName();?></title>
	
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- links de estilo -->
	<?php require("css/links-head.php"); ?>

	</head>
	<body>
    
	<!-- menu topo -->
	<?php require("requires/menu-top.php"); ?>

	<!-- Formulário de registro do novo usuário -->

	<section class="vh-100" style="background-color: #eee;">
		<div class="container h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
			<div class="col-lg-12 col-xl-11">
				<div class="card text-black" style="border-radius: 25px;">
				<div class="card-body p-md-5">
					<div class="row justify-content-center">
					<div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

						<p class="text-center h1 fw-bold mb-5 mx-1 mx-md-2 mt-1">Registro</p>

						<!-- inicio do formulário -->
						<form class="mx-1 mx-md-4" action="register.php" method="post">
						
						<!-- digitar o nome completo -->
						<div class="d-flex flex-row align-items-center mb-4">
							<i class="fas fa-user fa-lg me-3 fa-fw"></i>
							<div class="form-outline flex-fill mb-0">
							<label class="form-label" for="inputname">Nome Completo</label>
							<input type="text" name="inputname" placeholder="Janaína Machado" id="inputName" class="form-control" required />
							</div>
						</div>
						

						<!-- digitar o email -->
						<div class="d-flex flex-row align-items-center mb-4">
							<i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
							<div class="form-outline flex-fill mb-0">
							<label class="form-label" for="inputmail">Seu Email</label>
							<input type="email" name="inputmail" id="inputmail" placeholder="email@live.com" class="form-control" required />
							</div>
						</div>

						<!-- digitar o Celular -->
						<div class="d-flex flex-row align-items-center mb-4">
							<i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
							<div class="form-outline flex-fill mb-0">
							<label class="form-label" for="inputmail">Seu Celular</label>
							<input type="cellphone" name="inputcell" id="inputcellphone" class="form-control" placeholder="(53)999999999" required />
							</div>
						</div>

						<!-- digitar a senha -->
						<div class="d-flex flex-row align-items-center mb-4">
							<i class="fas fa-lock fa-lg me-3 fa-fw"></i>
							<div class="form-outline flex-fill mb-0">
							<label class="form-label" for="inputpassword">Senha</label>
							<input type="password" name="inputpassword" id="inputpassword" placeholder="Digite aqui sua senha" class="form-control" required />
							</div>
						</div>
						
						<!-- repetir a senha -->
						<div class="d-flex flex-row align-items-center mb-4">
							<i class="fas fa-key fa-lg me-3 fa-fw"></i>
							<div class="form-outline flex-fill mb-0">
							<label class="form-label" for="inputpasswordrepeat">Repita sua senha</label>
							<input type="password" name="inputpasswordrepeat" placeholder="Repita sua senha" id="inputpasswordrepeat" class="form-control" required />
							</div>
						</div>
						
						<!-- caixa de termos de uso -->
						<!-- <div class="form-check d-flex justify-content-center mb-5">
							<input class="form-check-input me-2" type="checkbox" value="termsservice" id="termsservice" />
							<label class="form-check-label" for="termsservice">
							Eu li e aceito todos   <a href="#!"> Termos de serviço</a>
							</label>
						</div> -->

						<!-- botão enviar -->
						<div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
							<button type="submit" name="submitform" class="btn btn-primary btn-lg">Registrar</button>
						</div>

						<?php
							if (isset($pwdNotSame)){
								echo "<p> $pwdNotSame </p>";
							}

							if ($Registered->getCheckCell() == true){
								echo "<p> Celular já cadastrado em outra conta. </p>";
							}
							
							if ($Registered->getCheckMail() == true){
								echo "<p> Email já cadastrado em outra conta. </p>";
							}
							
							if ($Registered->getCheckSafe()){
								echo "<p> Registro feito com sucesso! </p>";
							}
						?>
						</form>
						

					</div>
					</div>
				</div>
				</div>
			</div>
			</div>
		</div>
		
	</section>

	<script src="login/js/jquery.min.js"></script>
  <script src="login/js/popper.js"></script>
  <script src="login/js/bootstrap.min.js"></script>
  <script src="login/js/main.js"></script>

      <!-- rodape/footer -->
	  <?php require("requires/footer.php"); ?>

	<!-- links de estilo js e script Tawk.to -->
	<?php require("css/links-footer.php"); ?>

	</body>
</html>

