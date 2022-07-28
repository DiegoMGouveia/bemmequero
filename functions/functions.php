<?php

    // Aqui se encontram todas funções utilizada neste projeto.

    // Função login: função que irá verificar e tratar os dados recebidos para efetuar o login, 
    //  se os dados estiverem corretos, irá iniciar a sessão com os dados do usuário.
    // $usermail: será o documento, celular ou email cadastrado no banco de dados.
    // $pwd: será o password cadastrado no banco de dados.

    function login($usermail, $pwd, $conection) {


        try {

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
    function teste($conection){
        var_dump($conection);
    }
    
    function logout(){
        if(isset($_SESSION['userlogin'])) {
            //excluir a variavel de sessão
            session_destroy();
            header("Refresh: 0");
        } else {
        }
    }

    // função register($name,$doc,$mail,$pwd,$conection,$cell=null) para enviar para o banco de dados os dados cadastrais do novo usuário.
    // $name = Nome completo do usuário
    // $doc = CPF do usuário
    // $mail = Email do usuário
    // $pwd = password do usuário que já passou pela verificação se as 2 senhas são repetidas.
    // $conection = Objeto de conexão com o banco de dados.
    // $cell = Celular do usuário, caso esteja vazio receberá o valor nulo.

    function register($userObj,$conection){

        try {

            // checagem se o e-mail está cadastrado no banco de dados.
            $checkMail = $conection->prepare('SELECT * FROM users WHERE mail = :email'); 
            $checkMail->bindValue(':email', $userObj->getMail());
            $checkMail->execute();
            $resultMail = $checkMail->fetchAll(PDO::FETCH_BOTH);

            $CheckAll = new CheckMailCellDup();


            if (count($resultMail) > 0){
                // se o resultado for maior que 0 retorna "true" para o email
                $CheckAll->setCheckMail(true);
            }
            
            // checagem se o celular esta cadastrado no banco de dados.
            $checkCell = $conection->prepare('SELECT * FROM users WHERE cellphone = :cell'); 
            $checkCell->bindValue(':cell', $userObj->getCellPhone());
            $checkCell->execute();
            $resultCell = $checkCell->fetchAll(PDO::FETCH_BOTH);
            if (count($resultCell) > 0){

                // se o resultado for maior que 0 retorna "true" para o email
                $CheckAll->setCheckCell(true);

                return $CheckAll;
                
            }


            // se até aqui a variavel $CheckAll não foi setada, quer dizer que nenhum dos dados enviados pelo usuário se encontra no banco de dados
            // retornará true para confirmação de cadastro.
            if (null == $CheckAll->getCheckMail() && null == $CheckAll->getCheckCell()){

                $CheckAll->setCheckSafe(true);
                $stmt = $conection->prepare('INSERT INTO users(name,cellphone,mail,password) VALUES(:namee, :cell, :email, :pass)');
                $stmt->bindValue(':namee', $userObj->getName());
                $stmt->bindValue(':cell', $userObj->getCellPhone());
                $stmt->bindValue(':email', $userObj->getMail());
                $stmt->bindValue(':pass', MD5($userObj->getPassword()));
                $stmt->execute();

            }

            return $CheckAll;

            // caso retorne algum erro, a mensagem informará o erro.
        } catch(PDOException $e) {
            
            echo 'ERROR: ' . $e->getMessage();

        }


    }