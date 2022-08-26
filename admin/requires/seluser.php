<?php

    if(isset($_GET["seluser"])){
        $selectedUser = $_GET["seluser"];

        $ReturnUser = getUser($conn,$selectedUser);

    }


?>
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Editando Usuário:</h3>
    </div>
    <br>

    <div class="col-sm-4">
        
        <div class="text-center">
            <img class="profile-user-img img-fluid img-circle"
                src="<?php echo $ReturnUser->getImage(); ?>"
                alt="User profile picture">
        </div>

    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="admincp.php?seluser=<?php echo $selectedUser; ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
            
                <div class="col-sm-4">
                    <!-- nome input -->
                    <div class="form-group">
                        <label>Nome: </label>
                        <input type="text" class="form-control" name="inputNameUser" value="<?php echo $ReturnUser->getName();?>"  required>
                    </div>
                </div>


                    
            </div>
            

            <div class="row">
                <div class="col-sm-4">
                    <!-- Documento input -->
                    <div class="form-group">
                        <label>Documento</label>
                        <input type="text" name="inputDocUser" class="form-control" value="<?php echo $ReturnUser->getDocument();?>" required>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-4">
                    <!-- Celular input -->
                    <div class="form-group">
                        <label>Celular:</label>
                        <input type="text" name="inputCelUser" class="form-control" value="<?php echo $ReturnUser->getCellPhone();?>" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <!-- E-mail input -->
                    <div class="form-group">
                        <label>E-mail:</label>
                        <input type="text" name="inputMailUser" class="form-control" value="<?php echo $ReturnUser->getMail();?>" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <!-- Endereço input -->
                    <div class="form-group">
                        <label>Endereço:</label>
                        <input type="text" name="inputAdressUser" class="form-control" value="<?php echo $ReturnUser->getAdress();?>" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-1">
                    <!-- Registrado input (e-mail e celular confirmados)-->
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="confirmedInput" <?php if ($ReturnUser->getRegistered() == "true") { echo "checked";} ?> disabled>
                          <label class="custom-control-label" for="confirmedInput">Registrado</label>
                        </div>
                    </div>
                </div>
               

                <div class="col-sm-2">
                    <!-- email confirmado input -->
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="mailConfInput"  <?php if ($ReturnUser->getConf_mail() == "true") { echo "checked";} ?>>
                          <label class="custom-control-label" for="mailConfInput">Email Confirmado</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-2">
                    <!-- Celular confirmado input -->
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="cellConfInput" <?php if ($ReturnUser->getConf_cel() == "true") { echo "checked";} ?>>
                            <label class="custom-control-label" for="cellConfInput">Celular Confirmado</label>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                
                <div class="form-group">
                    <!-- <label for="customFile">Custom File</label> -->

                    <div class="custom-file">
                        <input type="file" accept="image/*" class="custom-file-input" name="inputImageUser" id="imageService" >
                        <label class="custom-file-label" for="inputImageService">Escolha uma imagem...</label>
                    </div>
                    <button type="submit" name="updateSend" class="btn"><a class="btn btn-app bg-success">
                  <i class="fas fa-save"></i> Salvar
                </a></button>

                    

                </div>

            </div>
            

        </form>
    </div>
    <!-- /.card-body -->
</div>