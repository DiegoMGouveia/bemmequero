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
							
							$formObj = new User();
							$formObj->setName($_POST["inputname"]);
							$formObj->setCellPhone($_POST["inputcell"]);
							$formObj->setMail($_POST["inputmail"]);
							$formObj->setPassword($_POST["inputpassword"]);
							// var_dump($formObj);
							$Registered = register($formObj,$conn);
							

						}else{
							$pwdNotSame = "As senhas devem ser iguais!";
						}
						
					}
				}
			}

		}
		
	}