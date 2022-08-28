<?php
    // novo serviço
    if (isset($_GET["newservice"]))
    {

      if (isset($_POST["serviceSend"]))
      {

        // back-end novo serviço
        $name = $_POST["inputNameService"];
        $price = $_POST["inputValorService"];
        $description = $_POST["inputDescriptionService"];
        $image = $_FILES["inputImageService"];
        // Manipulando arquivo de imagem
        $ext = strtolower(substr($image['name'],-4)); //Pegando extensão do arquivo
        $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
        $dir = 'img/service/'; //Diretório para uploads 
        $newPath = $dir . $new_name;
        move_uploaded_file($image['tmp_name'], $newPath); //Fazer upload do arquivo

        $NewService = new Service($name,$price,$description,$newPath);

        $insertResult = insertNewService($NewService, $conn);

      }

      require("admin/requires/new-service.php");

    // lista de serviços
    } elseif (isset($_GET["services"]))
    {

        // irá listar todos os serviços cadastrado no banco de dados.
        require("admin/requires/list-services.php");

    } elseif (isset($_GET["service"]))
    {

        // irá mostrar informações de um serviço cadastrado no banco de dados.
        require("admin/requires/service.php");

    } elseif (isset($_GET["delService"]))
    {

        // irá perguntar se o usuário deseja deletar um serviço cadastrado no banco de dados.
        require("admin/requires/delService.php");

    } elseif(isset($_GET["deleteServ"]))
    {
        
        $deleted = delService($conn);
        if ($deleted == true)
        {

            require("admin/requires/confirmDelServiceMsg.php");

        }

    }