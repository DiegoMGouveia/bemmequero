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

    // função para pegar a página atual e alterar os dados da classe
    // neste caso estará verificando se a pagina atual pertence ao menu de usuários
    function getOpenUserMenu()
    {
        $page = $_SERVER['REQUEST_URI'];
        $str = $page;
        if (strpos($str, 'listusers') !== false)
        {
            
            return 'nav-item menu-is-opening menu-open';

        } elseif (strpos($str, 'newuser'))
        {

            return 'nav-item menu-is-opening menu-open';

        } elseif (strpos($str, 'seluser'))
        {

            return 'nav-item menu-is-opening menu-open';

        } elseif (strpos($str, 'deleteUsr'))
        {

            return 'nav-item menu-is-opening menu-open';

        }
        

    }

    // neste caso estará verificando se a pagina atual pertence ao menu de serviços
    function getOpenServiceMenu()
    {
        $page = $_SERVER['REQUEST_URI'];
        $str = $page;
        if (strpos($str, 'newservice') !== false)
        {
            
            return 'nav-item menu-is-opening menu-open';

        } elseif (strpos($str, 'services'))
        {

            return 'nav-item menu-is-opening menu-open';

        } elseif (strpos($str, 'service'))
        {

            return 'nav-item menu-is-opening menu-open';

        } elseif (strpos($str, 'delService'))
        {

            return 'nav-item menu-is-opening menu-open';

        } elseif (strpos($str, 'deleteServ'))
        {

            return 'nav-item menu-is-opening menu-open';

        }
        

    }

    // neste caso estará verificando se a pagina atual pertence ao menu de galeria de fotos
    function getOpenGalleryMenu()
    {
        $page = $_SERVER['REQUEST_URI'];
        $str = $page;
        if (strpos($str, 'newgallery') !== false)
        {
            
            return 'nav-item menu-is-opening menu-open';

        } elseif (strpos($str, 'gallerys'))
        {

            return 'nav-item menu-is-opening menu-open';

        } elseif (strpos($str, 'editPhoto'))
        {

            return 'nav-item menu-is-opening menu-open';

        } elseif (strpos($str, 'delGallery'))
        {

            return 'nav-item menu-is-opening menu-open';

        } elseif (strpos($str, 'delGlry'))
        {

            return 'nav-item menu-is-opening menu-open';

        }
        

    }

    // neste caso estará verificando se a pagina atual pertence ao menu de serviços
    function getOpenConfigMenu()
    {
        $page = $_SERVER['REQUEST_URI'];
        $str = $page;
        $openMenu = 'nav-item menu-is-opening menu-open';

        if (strpos($str, 'config'))
        {
            
            return $openMenu;

        } elseif (strpos($str, 'configsuccess'))
        {

            return $openMenu;

        } elseif (strpos($str, 'about'))
        {

            return $openMenu;

        } elseif (strpos($str, 'team'))
        {

            return $openMenu;

        } 
        

    }

    function getPageActive()
    {
        if(isset($_GET["config"]))
        {
            
            return "config";

        } elseif (isset($_GET["about"]))
        {

            return "about";

        } elseif (isset($_GET["team"]))
        {

            return "team";

        } elseif (isset($_GET["configsuccess"]))
        {

            return "configsuccess";

        } elseif (isset($_GET["listusers"]))
        {

            return "listusers";

        } elseif (isset($_GET["seluser"]))
        {

            return "seluser";

        } elseif (isset($_GET["deleteUsr"]))
        {

            return "deleteUsr";

        } elseif (isset($_GET["newservice"]))
        {

            return "newservice";

        } elseif (isset($_GET["services"]))
        {

            return "services";

        } elseif (isset($_GET["service"]))
        {

            return "service";

        } elseif (isset($_GET["delService"]))
        {

            return "delService";

        } elseif (isset($_GET["deleteServ"]))
        {

            return "deleteServ";

        } elseif (isset($_GET["newgallery"]))
        {

            return "newgallery";

        } elseif (isset($_GET["gallerys"]))
        {

            return "gallerys";

        } elseif (isset($_GET["editPhoto"]))
        {

            return "editPhoto";

        } elseif (isset($_GET["delGallery"]))
        {

            return "delGallery";

        } elseif (isset($_GET["delGlry"]))
        {

            return "delGlry";

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
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            if (count($result) === 1) {


                $Service = new Service($result[0]->serviceID,$result[0]->name,$result[0]->price,$result[0]->description,$result[0]->image);
                

                return $Service;

            } else {
                return false;
            }
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


    function updateImgService($image)
    {
        $ext = strtolower(substr($image['name'],-4)); //Pegando extensão do arquivo

        $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
        $dir = 'img/service/'; //Diretório para uploads 
        $newPath = $dir . $new_name;

        move_uploaded_file($image['tmp_name'], $newPath); //Fazer upload do arquivo
        
        return $newPath;



    }


    // Função updateService irá verificar os inputs [admin/requires/service.php] e irá modificar o objeto Serviço e atualizar os dados no banco de dados 
    function updateService($conection, $ServiceObj)
    {
        // se o usuário inseriu um novo nome
        if(isset($_POST["inputNameService"]))
        {
            $ServiceObj->setName($_POST["inputNameService"]);
        }

        // se o usuário inseriu um novo valor
        if(isset($_POST["inputValorService"]))
        {
            $ServiceObj->setPrice($_POST["inputValorService"]);
        }

        // se o usuário inseriu uma nova descrição
        if(isset($_POST["inputDescriptionService"]))
        {
            $ServiceObj->setDescription($_POST["inputDescriptionService"]);
        }

        // se o usuário inseriu uma nova imagem
        if(!empty($_FILES["inputImageService"]))
        {
            // faz o upload da nova imagem e retorna o path da nova imagem
            $newImage = updateImgService($_FILES["inputImageService"]);

            // deletando imagem antiga
            unlink($ServiceObj->getImage());
            
            // setando novo path no atributo image
            $ServiceObj->setImage($newImage);

        }


        // se o usuário for admin, irá atualizar os dados no banco de dados
        if($_SESSION["userlogin"]->getType() == "Admin")
        {
            
            $sql = "UPDATE services SET name = :name, price = :price, description = :description, image = :image WHERE serviceID = :id ";
            $stmt = $conection->prepare($sql);

            $stmt->bindValue(':id', $ServiceObj->getServiceID());
            $stmt->bindValue(':name', $ServiceObj->getName());
            $stmt->bindValue(':price', $ServiceObj->getPrice());
            $stmt->bindValue(':description', $ServiceObj->getDescription());
            $stmt->bindValue(':image', $ServiceObj->getImage());
            $stmt->execute();

            return $ServiceObj;

        }

        echo "Somente o administrador pode efetuar esta operação.";

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
                 $stmt = $conection->prepare('UPDATE config SET name=:name, mail=:mail, phone=:phone, address=:address ');
                 $stmt->bindValue(':name', $configObj->getName());
                 $stmt->bindValue(':mail', $configObj->getMail());
                 $stmt->bindValue(':phone', $configObj->getPhone());
                 $stmt->bindValue(':address', $configObj->getAddress());
                 if ($stmt->execute())
                 {

                    return true;
                    
                 }
                 
     
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

    // Sobre Nós
    // irá retornar os dados da tabela about no banco de dados.
    function getAbout($conection)
    {

        try
        {

            $stmt = $conection->prepare('SELECT * FROM about ');
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            if (count($result) === 1) {


                $About = new About($result[0]->title,$result[0]->description,$result[0]->image);

                return $About;

            } else {
                return false;
            }
        
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

    }

    // Profissionais
    // irá inserir os dados do novo profissional na tabela team no banco de dados.
    function setTeam($TeamObj, $conection)
    {

        try
        {

            
            $stmt = $conection->prepare('INSERT INTO team(name, path, facebook, whatsapp, instagram, ocupation) VALUES(:nam, :pat, :face, :whats, :insta, :ocup)');
            $stmt->bindValue(':nam', $TeamObj->getName());

            // upload da imagem e renomeando
            $TeamObj->setPath(uploadImgTeam($TeamObj->getPath()));

            $stmt->bindValue(':pat', $TeamObj->getPath());
            $stmt->bindValue(':face', $TeamObj->getFacebook());
            $stmt->bindValue(':whats', $TeamObj->getWhats());
            $stmt->bindValue(':insta', $TeamObj->getInstagram());
            $stmt->bindValue(':ocup', $TeamObj->getOcupation());
            $stmt->execute();
            
            return true;
        
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

    }

    function uploadImgTeam($image)
    {
        $ext = strtolower(substr($image['name'],-4)); //Pegando extensão do arquivo

        $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
        $dir = 'img/team/'; //Diretório para uploads 
        $newPath = $dir . $new_name;

        move_uploaded_file($image['tmp_name'], $newPath); //Fazer upload do arquivo
        
        return $newPath;



    }



    