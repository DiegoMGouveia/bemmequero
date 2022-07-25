<!-- NAVIGATION 
=================-->
<div class="topmenu">
    <div class="container">
    <div class="row"  id="page-top">
        <div class="col-md-4 col-sm-4 phone"> 
            <div><i class="fa fa-phone"></i> Celular/ WhatsApp: (53) 98464-7737</div> 
        </div>	
        <div class="col-md-4 col-sm-4 address"> 
            <div><i class="fa fa-map-marker"></i> Rua Almirante Barroso, 3172 - Sala D <br> Pelotas-RS</div> 
        </div> 

        <?php 
        // verificação de login, de o usuário estiver logado irá apresentar uma mensagem de boas vindas.
        if (isset($_SESSION['userlogin'])){ ?>
        <div class="col-md-4 col-sm-4 address"> 
            <div><i class="fa fa-map-marker"></i> 
            <?php
            // verifica se o botão logout foi ACIONADO
            if (isset($_POST['logout'])){
                logout();
            }

            echo "Olá " . $_SESSION['userlogin']->getName() . " seja bem-vindo(a)."; ?><form action="#logout" class="signin-form" method="post"> <button class="btn btn-dark btn-sm" name="logout" type="submit">Sair.</button></form>

            </div> 
        </div> 
        <?php } ?>
    </div>
    </div>
</div> 

<nav class="navbar navbar-expand-lg navbar-light" id="mainNav" data-toggle="affix">
    <div class="container-fluid">
              	<a class="navbar-brand js-scroll-trigger" href="index.php"><img src="img/logo3.jpg" style="max-height: 60px;" alt="" class="img-fluid"> <span class="h2">Bem Me Quero Studio</span></a>
    <button class="navbar-toggler navbar-toggler-center  ml-auto py-3 my-2 " type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#home">Inicio</a>
        </li>
        <?php 
        // verificação de login, de o usuário estiver logado, não mostrará o campo login/registro.
        if (!isset($_SESSION['userlogin'])){ ?>
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="login.php">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="register.php">Cadastrar</a>
        </li>
        <?php 
        }
        // verifica se o usuário logado é administrador
        if ($_SESSION['userlogin']->getType() == "Admin"){ 
            ?>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#">Administração</a>
            </li>
            <?php 
        }
        ?>
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Serviços</a>
        </li>
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">Sobre Nós</a>
        </li>  
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#team">Profissional</a>
        </li>
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#portfolio">Estilo do cliente</a>
        </li>
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#testimonials">Depoimentos</a>
        </li> 
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contato</a>
        </li>
        </ul>
    </div>
    </div>
</nav>
