<?php 
    require("bmqdb/connection.php");

    session_start();
?>

<!doctype html>
<html lang="pt-br">
  <head>
  	<title>Cadastrar - Studio Bem Me Quero</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php require("css/links-head.php"); ?>
	

	</head>
	<body>
	

    <?php require("login/menu-top.php"); ?>
	<section class="vh-100" style="background-color: #eee;">
		<div class="container h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
			<div class="col-lg-12 col-xl-11">
				<div class="card text-black" style="border-radius: 25px;">
				<div class="card-body p-md-5">
					<div class="row justify-content-center">
					<div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

						<p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Registro</p>

						<!-- inicio do formulário -->
						<form class="mx-1 mx-md-4" action="register.php" method="post">
						<?php
						//verificar botão enviar
						if (isset($_POST["submitform"])) {
							// verifica se o campo NOME esta preenchido
							if(isset($_POST["inputname"]) && !empty($_POST["inputname"])) {
								// verifica se o campo Email esta preenchido
								if(isset($_POST["inputmail"]) && !empty($_POST["inputmail"])) {
									// verifica se o campo Senha esta preenchido
									if(isset($_POST["inputpassword"]) && !empty($_POST["inputpassword"])) {
										// verifica se o campo Repetir Senha esta preenchido
										if(isset($_POST["inputpasswordrepeat"]) && !empty($_POST["inputpasswordrepeat"])) {

											$form = [
												"name" => filter_var($_POST["inputname"]),
												"mail" => filter_var($_POST["inputmail"]),
												"password" => filter_var($_POST["inputpassword"]),
												"rpassword" => filter_var($_POST["inputpasswordrepeat"]),
											];
											var_dump($form);
										}
									}
								}

							}
							
							
						}

						?>
						<!-- digitar o nome completo -->
						<div class="d-flex flex-row align-items-center mb-4">
							<i class="fas fa-user fa-lg me-3 fa-fw"></i>
							<div class="form-outline flex-fill mb-0">
							<input type="text" name="inputname" placeholder="Janaína Machado" id="inputName" class="form-control" required />
							<label class="form-label" for="inputname">Nome Completo</label>
							</div>
						</div>
						

						<!-- digitar o email -->
						<div class="d-flex flex-row align-items-center mb-4">
							<i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
							<div class="form-outline flex-fill mb-0">
							<input type="email" name="inputmail" id="inputmail" placeholder="email@live.com" class="form-control" required />
							<label class="form-label" for="inputmail">Seu Email</label>
							</div>
						</div>

						<!-- digitar o Celular -->
						<div class="d-flex flex-row align-items-center mb-4">
							<i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
							<div class="form-outline flex-fill mb-0">
							<input type="cellphone" name="inputmail" id="inputcellphone" class="form-control" placeholder="(53)999999999" required />
							<label class="form-label" for="inputmail">Seu Celular</label>
							</div>
						</div>

						<!-- digitar a senha -->
						<div class="d-flex flex-row align-items-center mb-4">
							<i class="fas fa-lock fa-lg me-3 fa-fw"></i>
							<div class="form-outline flex-fill mb-0">
							<input type="password" name="inputpassword" id="inputpassword" placeholder="Digite aqui sua senha" class="form-control" required />
							<label class="form-label" for="inputpassword">Senha</label>
							</div>
						</div>
						
						<!-- repetir a senha -->
						<div class="d-flex flex-row align-items-center mb-4">
							<i class="fas fa-key fa-lg me-3 fa-fw"></i>
							<div class="form-outline flex-fill mb-0">
							<input type="password" name="inputpasswordrepeat" placeholder="Repita sua senha" id="inputpasswordrepeat" class="form-control" required />
							<label class="form-label" for="inputpasswordrepeat">Repita sua senha</label>
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

						</form>
						

					</div>
					<div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

						<img src="img/logo3.jpg"
						class="img-fluid" alt="logo Studio Bem Me Quero">

					</div>
					</div>
				</div>
				</div>
			</div>
			</div>
		</div>
		
	</section>

      <!-- rodape/footer -->
	  <?php require("requires/footer.php"); ?>

	<!-- links de estilo js e script Tawk.to -->
	<?php require("css/links-footer.php"); ?>

	</body>
</html>

