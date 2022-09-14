<?php

    // retorna dados do serviço com base no valor do GET
    $returnService = getService($conn,$_GET["service"]);
    
    if(isset($_POST["serviceUpdateSend"]))
    {

        $returnService = updateService($conn, $returnService);
        
        
    }

?>
<div class="card card-warning">
    <div class="card-header">
    <h3 class="card-title">Editando Serviço:</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <form action="admincp.php?service=<?php echo $_GET["service"];?>" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-6">
                <!-- nome input -->
                <div class="form-group">
                    <label>Nome do serviço</label>
                    <input type="text" class="form-control" name="inputNameService" value="<?php echo $returnService->getName();?>"  required>
                </div>
            </div>

            <div class="col-sm-3">
                <!-- Preço input -->
                <div class="form-group">
                    <label>Valor do serviço</label>
                    <input type="text" name="inputValorService" class="form-control" value="<?php echo $returnService->getPrice();?>" required>
                </div>
            </div>
        
        </div>
        <div class="row">
        <div class="col-sm-6">
            <!-- textarea -->
            <div class="form-group">
            <label>Descrição:</label>
            <textarea class="form-control" name="inputDescriptionService" rows="3" required><?php echo $returnService->getDescription();?></textarea>
            </div>
            <div class="form-group">
                <!-- <label for="customFile">Custom File</label> -->

                <div class="custom-file">
                    <input type="file" accept="image/*" class="custom-file-input" name="inputImageService" id="imageService" >
                    <label class="custom-file-label" for="inputImageService">Escolha uma imagem...</label>
                </div>
            </div>
            <button type="submit" name="serviceUpdateSend" class="btn btn-primary">Atualizar Serviço</button>

            <div class="container">
                Imagem do Serviço:
                <img src="<?php echo $returnService->getImage();?>" width="400">
            </div>

        </div>
        
        </div>

    </form>
    </div>
    <!-- /.card-body -->
</div>