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
            $run = $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($result) === 1) {

                return $result[0];

            } else {
                return false;
            }
        
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
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
