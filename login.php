<?php
	session_start();

	require_once("bmqdb/connection.php");
    require("functions/functions.php");

    // requiremento de todas as classes necessárias para o projeto.
    require_once("class/classes.php");


	if (isset($_SESSION["userlogin"]))
	{
		
	}
	
	// verifica se o usuário e senha estão setados

	if(!isset ($_SESSION["userlogin"]))
	{
		if(isset($_POST["usermail"]) && isset($_POST["password"]))
		{

			// se verdadeiro, irá verificar se os dados digitados estão no banco de dados.
			$Login = login($_POST["usermail"],MD5($_POST["password"]),$conn);
			if ( $Login == false )
			{
				//login errado irá retornar a variavel $mensagem com a mensagem de erro.
				$mensagem = "Usuário/senha incorreto. Tente novamente.";
			} else 
			{
				// caso retorne o objeto, criará uma sessão com o objeto $login retornado.
				
				$_SESSION['userlogin'] = new User($Login->name,$Login->cellphone,$Login->mail,$Login->password,$Login->image,$Login->user_id,$Login->document,$Login->adress,$Login->wallet,$Login->registered,$Login->conf_mail,$Login->conf_cel,$Login->type);
				
				// verifica se o usuário ja efetuou o login, caso esteja logado, redirecionará para a página inicial.
				checkUserLogin();
				
			} 

		}
	}
	
?>


<!doctype html>
<html lang="PT-BR">
  <head>
  	<title>Login Studio Bem Me Quero</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="login/css/style.css">

    <?php require("css/links-head.php"); ?>

	</head>
	<body>


    <?php require("requires/menu-top.php"); ?>
	<section id="login" class="login ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login - Studio Bem Me Quero</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2>Bem-vindo(a) ao login</h2>
								<p>Não possui cadastro?</p>
								<a href="register.php" class="btn btn-white btn-outline-white">Cadastrar-se</a>
							</div>
			      </div>
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Cadastrar-se</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
			      	</div>
							<form action="login.php" class="signin-form" method="post">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Usuário</label>
			      			<input type="text" name="usermail" class="form-control" placeholder="Usuário" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Senha</label>
		              <input type="password" name="password" class="form-control" placeholder="Senha" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary submit px-3">Entrar</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Lembrar-me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="#">Esqueci a senha</a>
									</div>
		            </div>
					<?php
					if (isset($mensagem)){
						echo $mensagem;
					}
					?>
		          </form>
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

