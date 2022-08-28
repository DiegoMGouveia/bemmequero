<?php
    
    if (isset($_GET["listusers"]))
    {

      require("admin/requires/list-users.php");

    } elseif (isset($_GET["seluser"]))
    {

      if (isset($_POST["updateSend"]))
      {
        $UserObj = getUser($conn,$_GET["seluser"]);
        
        if($_FILES["inputImageUser"] > 0)
        {
          // verifica se a extensão é uma extensão qualificada
          $ext = strtolower(substr($_FILES["inputImageUser"]['name'],-4));
          if ($ext == ".jpg" || $ext == ".png" || $ext == ".gif" || $ext == ".bmp")
          {

            $image = $_FILES["inputImageUser"];

            // verifica se a imagem não é a padrão do sistema antes de deletar
            if ($UserObj->getImage() != "img/profile/noimg.jpg")
            {
              
              unlink($UserObj->getImage());

            }

            $UserObj->setImage(uploadImgUser($image));

          }
          
        }

        $UpdatedUser = updateUser($conn, $UserObj);
                    
      }

      require("admin/requires/seluser.php");

    } elseif(isset($_GET["deleteUsr"]))
    {
          // Deletar Usuário
      $deleted = delUser($conn);
      if ($deleted == true)
      {
        require("admin/requires/confirmDelUserMsg.php");
      }

    }