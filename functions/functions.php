<?php



// Aqui se encontram todas funções utilizada neste projeto.

    // Acesso

    // Função login: função que irá verificar e tratar os dados recebidos para efetuar o login e iniciar uma sessão do usuário caso os dados estejam corretos.
    function login($usermail, $pwd, $conection)
    {


        try
        {

            $stmt = $conection->prepare('SELECT * FROM users WHERE document = :documen AND password = :pass OR cellphone = :cell AND password = :pass OR mail = :email AND password = :pass ');
            $stmt->bindValue(':documen', $usermail);
            $stmt->bindValue(':pass', $pwd);
            $stmt->bindValue(':email', $usermail);
            $stmt->bindValue(':cell', $usermail);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            if (count($result) === 1) {


                return $result[0];

            } else {
                return false;
            }
        
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

    }

    // função checkUserLogin verifica se a sessão userlogin esta setada, caso esteja, envia o usuário para ao index.php
    function checkUserLogin(){
        if (isset($_SESSION['userlogin'])) {
            header("location:index.php");
        }

    }

    // função de teste podendo ser alterada a qualquer momento a fim de testar alguma variavel ou objeto
    function teste($conection)
    {
        echo "<pre>";
        var_dump($conection);
        echo "</pre>";

    }
    
    // Função para encerrar a sessão do usuário
    function logout(){
        if(isset($_SESSION['userlogin']))
        {
            //excluir a variavel de sessão
            session_destroy();
            header("Refresh: 0");
        } else {
        }
    }



    // Usuário


    // função register para enviar para o banco de dados os dados cadastrais do novo usuário.


    function register($userObj,$conection)
    {

        try 
        {

            // checagem se o e-mail está cadastrado no banco de dados.
            $checkMail = $conection->prepare('SELECT * FROM users WHERE mail = :email'); 
            $checkMail->bindValue(':email', $userObj->getMail());
            $checkMail->execute();
            $resultMail = $checkMail->fetchAll(PDO::FETCH_BOTH);
            $CheckAll = new CheckMailCellDup();


            if (count($resultMail) > 0)
            {
                // se o resultado for maior que 0 retorna "true" para o email
                $CheckAll->setCheckMail(true);
            }
            
            // checagem se o celular esta cadastrado no banco de dados.
            $checkCell = $conection->prepare('SELECT * FROM users WHERE cellphone = :cell'); 
            $checkCell->bindValue(':cell', $userObj->getCellPhone());
            $checkCell->execute();
            $resultCell = $checkCell->fetchAll(PDO::FETCH_BOTH);
            if (count($resultCell) > 0)
            {

                // se o resultado for maior que 0 retorna "true" para o email
                $CheckAll->setCheckCell(true);

                return $CheckAll;
                
            }


            // se até aqui a variavel $CheckAll não foi setada, quer dizer que nenhum dos dados enviados pelo usuário se encontra no banco de dados
            // retornará true para confirmação de cadastro.
            if (null == $CheckAll->getCheckMail() && null == $CheckAll->getCheckCell())
            {

                $CheckAll->setCheckSafe(true);
                $stmt = $conection->prepare('INSERT INTO users(name,cellphone,mail,password,image) VALUES(:namee, :cell, :email, :pass, :img)');
                $stmt->bindValue(':namee', $userObj->getName());
                $stmt->bindValue(':cell', $userObj->getCellPhone());
                $stmt->bindValue(':email', $userObj->getMail());
                $stmt->bindValue(':pass', MD5($userObj->getPassword()));
                $stmt->bindValue(':img', $userObj->getImage());
                $stmt->execute();

            }

            return $CheckAll;

            // caso retorne algum erro, a mensagem informará o erro.
        } catch(PDOException $e)
        {
            
            echo 'ERROR: ' . $e->getMessage();

        }


    }


    // função getAllUsers usada para buscar todos os usuários ou uma pesquisa especifica
    function getAllUsers($conection, $search = null)
    {

        if ($search === null)
        {
            
            $query = 'SELECT * FROM users'; 
            
        } else 
        {

            $query = 'SELECT * FROM users WHERE user_id = :search OR name = :search OR document = :search OR cellphone = :search OR mail = :search OR type = :search ';
        }

        $stmt = $conection->prepare($query);
        if ($search != null)
        {
    
            $stmt->bindValue(':search', $search);

        }
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
        
    }


    function getUser($conection, $userId)
    {

        if($_SESSION["userlogin"]->getType() == "Admin")
        {

            $query = 'SELECT * FROM users WHERE user_id = :search ';
            $stmt = $conection->prepare($query);
            $stmt->bindValue(':search', $userId);
            $stmt->execute();
            $Result = $stmt->fetchAll(PDO::FETCH_OBJ);
            $UserSelected = new User($Result[0]->name,$Result[0]->cellphone,$Result[0]->mail,$Result[0]->password, $Result[0]->image, $Result[0]->user_id, $Result[0]->document, $Result[0]->adress, $Result[0]->wallet, $Result[0]->registered, $Result[0]->conf_mail, $Result[0]->conf_cel, $Result[0]->type);

            return $UserSelected;
        } else
        {
            echo "Somente o administrador pode fazer isso!";
        }

    }

    // Deletar usuário [Admin]

    function delUser($conection)
    {

        if($_SESSION["userlogin"]->getType() == "Admin")
        {
            $userId = $_GET["deleteUsr"];

            $query = "DELETE FROM users WHERE user_id = :search";

            $stmt = $conection->prepare($query);
            $stmt->bindValue(':search', $userId);

            $stmt->execute();


            return true;
        } else
        {
            echo "Somente o administrador pode fazer isso!";
        }

        
        
    }


    function uploadImgUser($image)
    {
        $ext = strtolower(substr($image['name'],-4)); //Pegando extensão do arquivo

        $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
        $dir = 'img/profile/'; //Diretório para uploads 
        $newPath = $dir . $new_name;
        teste($image['tmp_name']);

        move_uploaded_file($image['tmp_name'], $newPath); //Fazer upload do arquivo
        
        return $newPath;



    }

    function updateUser($conection, $UserObj)
    {
        if(isset($_POST["inputNameUser"]))
        {
            $UserObj->setName($_POST["inputNameUser"]);
        }

        if(isset($_POST["inputDocUser"]))
        {
            $UserObj->setDocument($_POST["inputDocUser"]);
        }

        if(isset($_POST["inputCelUser"]))
        {
            $UserObj->setCellPhone($_POST["inputCelUser"]);
        }

        if(isset($_POST["inputMailUser"]))
        {
            $UserObj->setMail($_POST["inputMailUser"]);
        }

        if(isset($_POST["inputAdressUser"]))
        {
            $UserObj->setAdress($_POST["inputAdressUser"]);
        }

        if(isset($_POST["confirmedInput"]))
        {
            $UserObj->setRegistered($_POST["confirmedInput"]);
        }

        if(isset($_POST["mailConfInput"]))
        {
            $UserObj->setConf_mail($_POST["mailConfInput"]);
        }

        if(isset($_POST["cellConfInput"]))
        {
            $UserObj->setConf_cel($_POST["cellConfInput"]);
        }

        if($_SESSION["userlogin"]->getType() == "Admin")
        {
            // uploadImgUser($UserObj)
            $sql = "UPDATE users SET name = :name, document = :document, cellphone = :cellphone, mail = :mail, adress = :adress, image = :image, registered = :registered, conf_mail = :conf_mail, conf_cel = :conf_cel, type = :type WHERE user_id = :user_id ";
            $stmt = $conection->prepare($sql);

            $stmt->bindValue(':user_id', $UserObj->getUser_id());
            $stmt->bindValue(':name', $UserObj->getName());
            $stmt->bindValue(':document', $UserObj->getDocument());
            $stmt->bindValue(':cellphone', $UserObj->getCellphone());
            $stmt->bindValue(':mail', $UserObj->getMail());
            $stmt->bindValue(':adress', $UserObj->getAdress());
            $stmt->bindValue(':image', $UserObj->getImage());
            $stmt->bindValue(':registered', $UserObj->getRegistered());
            $stmt->bindValue(':conf_mail', $UserObj->getConf_mail());
            $stmt->bindValue(':conf_cel', $UserObj->getConf_cel());
            $stmt->bindValue(':type', $UserObj->getType());
            $stmt->execute();

            return $UserObj;

        }

        echo "Somente o administrador pode efetuar esta operação.";

    }



    // Services

    // Função insertNewService usada para adicionar um novo serviço ao banco de dados.
    function insertNewService($serviceObj, $conection)
    {

        if($_SESSION["userlogin"]->getType() == "Admin")
        {
        
            try {
                $stmt = $conection->prepare('INSERT INTO services(name,price,description,image) VALUES(:namee, :pric, :descr, :img)');
                $stmt->bindValue(':namee', $serviceObj->getName());
                $stmt->bindValue(':pric', $serviceObj->getPrice());
                $stmt->bindValue(':descr', $serviceObj->getDescription());
                $stmt->bindValue(':img', $serviceObj->getImage());
                $stmt->execute();
                
                return true;
    
            } catch(PDOException $e)
            {
            
                echo 'ERROR: ' . $e->getMessage();
                return false;
    
            }

        } else{
            echo "Somente o administrador pode fazer isso!";
        }



    }

    // lista todos os serviços ou o resultado de uma pesquisa
    function getAllServices($conection, $search = null)
    {

        if ($search === null)
        {
            
            $query = 'SELECT * FROM services'; 
            
        } else
        {

            $query = 'SELECT * FROM services WHERE serviceID = :search OR name = :search OR description = :search ';
        }

        $stmt = $conection->prepare($query);

        if ($search != null)
        {
    
            $stmt->bindValue(':search', $search);

        }
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
        
    }

    // seleciona um serviço pelo ID
    function getService($conection, $serviceId)
    {

        if($_SESSION["userlogin"]->getType() == "Admin")
        {

            $query = 'SELECT * FROM services WHERE serviceID = :search ';
            $stmt = $conection->prepare($query);
            $stmt->bindValue(':search', $serviceId);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result[0];
        } else
        {
            echo "Somente o administrador pode fazer isso!";
        }

    }

    function delService($conection)
    {

        if($_SESSION["userlogin"]->getType() == "Admin")
        {
            $serviceId = $_GET["deleteServ"];

            $query = "DELETE FROM services WHERE serviceID = :search";

            $stmt = $conection->prepare($query);
            $stmt->bindValue(':search', $serviceId);

            $stmt->execute();


            return true;
        } else
        {
            echo "Somente o administrador pode fazer isso!";
        }

        
        
    }


    // galeria
     // Função insertNewGallery usada para adicionar uma nova imagem ao banco de dados.
     function insertNewGallery($galleryObj, $conection)
     {
 
         if($_SESSION["userlogin"]->getType() == "Admin")
         {
         
             try {
                 $stmt = $conection->prepare('INSERT INTO gallery(title,path,date) VALUES(:title, :path, :date)');
                 $stmt->bindValue(':title', $galleryObj->getTitle());
                 $stmt->bindValue(':path', $galleryObj->getPath());
                 $stmt->bindValue(':date', $galleryObj->getDate());
                 $stmt->execute();
                 
                 return true;
     
             } catch(PDOException $e)
             {
             
                 echo 'ERROR: ' . $e->getMessage();
                 return false;
     
             }
 
         } else{
             echo "Somente o administrador pode fazer isso!";
         }
 
 
 
     }


    // Deletar Imagem pelo GET[Admin] 

    function delGallery($conection)
    {

        if($_SESSION["userlogin"]->getType() == "Admin")
        {
            $galleryId = $_GET["delGlry"];

            $selphoto = getPhoto($conection, $galleryId);
            unlink($selphoto["path"]);


            $query = "DELETE FROM gallery WHERE galleryID = :search";

            $stmt = $conection->prepare($query);
            $stmt->bindValue(':search', $galleryId);

            $stmt->execute();


            return true;
        } else
        {
            echo "Somente o administrador pode fazer isso!";
        }
 
    }



    // lista todos as fotos ou o resultado de uma pesquisa
    function getAllPhotos($conection, $search = null)
    {

        if ($search === null)
        {
            
            $query = 'SELECT * FROM gallery'; 
            
        } else
        {

            $query = 'SELECT * FROM gallery WHERE galleryID = :search OR title = :search ';
        }

        $stmt = $conection->prepare($query);

        if ($search != null)
        {
    
            $stmt->bindValue(':search', $search);

        }
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
                
    }


    // seleciona um foto pelo ID
    function getPhoto($conection, $galleryId)
    {

        $query = 'SELECT * FROM gallery WHERE galleryID = :search ';
        $stmt = $conection->prepare($query);
        $stmt->bindValue(':search', $galleryId);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result[0];

    }


    // CONFIG ~~

     // Função usada para atualizar as informações de configuração do site no banco de dados.
     function updateConfig($configObj, $conection)
     {
 
         if($_SESSION["userlogin"]->getType() == "Admin")
         {
         
             try {
                 $stmt = $conection->prepare('INSERT INTO config(name,mail,phone,address) VALUES(:name, :mail, :phone, address)');
                 $stmt->bindValue(':name', $configObj->getName());
                 $stmt->bindValue(':mail', $configObj->getMail());
                 $stmt->bindValue(':phone', $configObj->getPhone());
                 $stmt->bindValue(':address', $configObj->getAddress());
                 $stmt->execute();
                 
                 return true;
     
             } catch(PDOException $e)
             {
             
                 echo 'ERROR: ' . $e->getMessage();
                 return false;
     
             }
 
         } else{
             echo "Somente o administrador pode fazer isso!";
         }
 
 
 
     }

    // Retornará o objeto com os dados do banco de dados com informações de configurações do site.
     function getConfig($conection)
     {

        try
        {

            $stmt = $conection->prepare('SELECT * FROM config ');
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            if (count($result) === 1) {


                $Config = new Config($result[0]->name,$result[0]->mail,$result[0]->phone,$result[0]->address);

                return $Config;

            } else {
                return false;
            }
        
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

    }






    