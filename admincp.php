<?php 


    require ("bmqdb/connection.php");
    require ("functions/functions.php");
    checkUserLogin();

    // requiremento de todas as classes necessárias para o projeto.
    require('class/classes.php');


    session_start();

    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Studio Bem Me Quero | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="img/logo4.png" alt="Studio Bem Me Quero logo" height="80" width="80">
  </div> -->

  <?php
    // Navbar / Menu topo + notificações
    require("admin/requires/menu-topo.php");
    ?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="admincp.php" class="brand-link">
      <img src="img/logo4.png" alt="Studio Bem Me Quero Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Administração</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $_SESSION['userlogin']->getImage(); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['userlogin']->getName(); ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

              
          <?php

          // Menu Usuários
          require("admin/requires/menu-users.php");

          // menu serviços
            require("admin/requires/menu-left-services.php");

          // menu galeria
          require("admin/requires/menu-left-gallery.php");

          // menu Caixa de mensagens
          require("admin/requires/menu-left-mailbox.php");

          // menu Configurações do site
          require("admin/requires/menu-config.php");
          ?>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Painel Administrativo - Studio Bem Me Quero</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item active">Painel Administrativo</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php 
          if (isset($_GET["newservice"])){

            if (isset($_POST["serviceSend"])){
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
              teste($insertResult);
            };

            require("admin/requires/new-service.php");


        } elseif (isset($_GET["services"])){
          // irá listar todos os serviços cadastrado no banco de dados.
          require("admin/requires/services.php");
        } elseif (isset($_GET["service"])){
          // irá mostrar informações de um serviço cadastrado no banco de dados.
          require("admin/requires/service.php");
        } elseif (isset($_GET["delService"])){
          // irá perguntar se o usuário deseja deletar um serviço cadastrado no banco de dados.
          require("admin/requires/delService.php");
        } elseif(isset($_GET["deleteServ"])){

            
            $deleted = delService($conn);
            if ($deleted == true){
              require("admin/requires/confirmDelServiceMsg.php");
            }

        }
        
        // teste($deleted);

        ?>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="https://www.linkedin.com/in/diegomaltagouveia/">Diego M. Gouveia</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 0.2.8
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="admin/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="admin/plugins/raphael/raphael.min.js"></script>
<script src="admin/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="admin/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="admin/plugins/chart.js/Chart.min.js"></script>



<!-- AdminLTE for demo purposes -->
<script src="admin/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="admin/dist/js/pages/dashboard2.js"></script>


</body>
</html>
