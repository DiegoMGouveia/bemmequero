
<div class="row">
    <div class="col-md-3">
        

    <!-- Profile Image -->
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
        <div class="text-center">
            <img class="profile-user-img img-fluid img-circle"
                src="<?php echo $_SESSION['userlogin']->getImage(); ?>"
                alt="User profile picture">
        </div>

        <h3 class="profile-username text-center"><?php echo $_SESSION["userlogin"]->getName(); ?></h3>

        <p class="text-muted text-center"><?php echo $_SESSION["userlogin"]->getType(); ?></p>

        <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
            <b>Carteira</b> <a class="float-right">R$ <?php echo $_SESSION["userlogin"]->getWallet(); ?></a>
            </li>
            <li class="list-group-item">
            <b>Quantidade de serviços</b> <a class="float-right">543</a>
            </li>
        </ul>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- About Me Box -->
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Meus dados</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <strong><i class="fas fa-solid fa-user mr-1"></i> Nome</strong>

        <p class="text-muted">
            <?php echo $_SESSION["userlogin"]->getName(); ?>
        </p>

        <hr>

        <strong><i class="fas fa-map-marker-alt mr-1"></i> Endereço</strong>

        <p class="text-muted"><?php echo $_SESSION["userlogin"]->getAdress(); ?></p>

        <hr>
        <strong><i class="fas fa-solid fa-mobile mr-1"></i> Celular</strong>

        <p class="text-muted">

            <?php echo $_SESSION["userlogin"]->getCellPhone(); ?>
            
        </p>

        <hr>

        <strong><i class="fas fa-solid fa-at"></i> Email</strong>

        <p class="text-muted">

            <?php 
            echo $_SESSION["userlogin"]->getMail(); 
            
            if($_SESSION["userlogin"]->getConf_mail() == "false")
            {
                echo " (Não confirmado)";
            }
            
            ?>
            
        </p>

        <hr>

        <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.col -->
    
    
</div>