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

						// verifica se os campos de senha estão iguais
						if ($_POST["inputpassword"] === $_POST["inputpasswordrepeat"]){


							$image = $_FILES["inputImageService"];
							// Manipulando arquivo de imagem
							$ext = strtolower(substr($image['name'],-4)); //Pegando extensão do arquivo
							$new_name = $_SESSION["userlogin"]->getName() . $ext; //Definindo um novo nome para o arquivo
							$dir = 'img/profile/'; //Diretório para uploads 
							$newPath = $dir . $new_name;
							move_uploaded_file($image['tmp_name'], $newPath); //Fazer upload do arquivo
							
							$formArray = [

								$_POST["inputname"],
								$_POST["inputcell"],
								$_POST["inputmail"],
								$_POST["inputpassword"],
								$newPath

							];
							$formObj = new User($formArray[0], $formArray[1], $formArray[2], $formArray[3], $formArray[4]);
							// var_dump($formObj);
							$Registered = register($formObj,$conn);
							
							// debugando saida $Registered
							
							// echo "<pre>";
							// var_dump($Registered);
							// echo "</pre>";

							

						}else{
							$pwdNotSame = "As senhas devem ser iguais!";
						}
						
					}
				}
			}

		}
		
	}