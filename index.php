<?php 
    require("bmqdb/connection.php");
    require("functions/functions.php");

    // requiremento de todas as classes necessárias para o projeto.
    require('class/classes.php');

    session_start();
    
    if (isset($_SESSION["roolback"]))
    {
        $roolback = $_SESSION["roolback"];
        unset($_SESSION["roolback"]);
        if ($_SESSION["userlogin"]->getType() === "Admin")
        {
            header("location:" . $roolback);
        } elseif($_SESSION["userlogin"]->getType() === "user")
        {
            header("location:usercp.php");
        }
    }

    $Config = getConfig($conn);
    $About = getAbout($conn);
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $Config->getName();?></title>
    
    <!-- links de estilo -->
    <?php require("css/links-head.php"); ?>
</head>
<body>
    
    <!-- menu topo -->
    <?php require("requires/menu-top.php"); ?>

    <!-- header -->
    <?php require("requires/header.php"); ?>

    <!-- Serviços -->
    <?php require("requires/services.php"); ?>

    <!-- Sobre nós -->
    <?php require("requires/about.php"); ?>

    <!-- Estilo Perfeito -->
    <?php require("requires/perfectstyle.php"); ?>

    <!-- Profissionais -->
    <?php require("requires/team.php"); ?>

    <!-- Galeria de fotos -->
    <?php require("requires/gallery.php"); ?>

    <!-- Comentários dos Clientes -->
    <?php require("requires/testimonials.php"); ?>

    <!-- Contate nos -->
    <?php require("requires/contact.php"); ?>

    <!-- rodape/footer -->
    <?php require("requires/footer.php"); ?>

    <!-- links de estilo js e script Tawk.to -->
    <?php require("css/links-footer.php"); ?>
</body>
</html>