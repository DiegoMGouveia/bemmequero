<?php

    // retorna dados do serviço com base no valor do GET
    $returnGallery = getPhoto($conn,$_GET["selPhoto"]);
    if(isset($_POST["galleryUpdateSend"]))
    {

        $returnGallery->setTitle($_POST["inputTitleGallery"]);
        $returnGallery = updateGallery($conn, $returnGallery);
        
    }

?>
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Editando Foto:</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="admincp.php?selPhoto=<?php echo $returnGallery->getId();?>" method="POST">
            <div class="row">
                <div class="col-sm-6">
                    <!-- nome input -->
                    <div class="form-group">
                        <label>Nome do serviço</label>
                        <input type="text" class="form-control" name="inputTitleGallery" value="<?php echo $returnGallery->getTitle();?>"  required>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-6">
                    <button type="submit" name="galleryUpdateSend" class="btn btn-primary">Atualizar Imagem</button>

                    <div class="container">
                        Imagem:
                        <img src="<?php echo $returnGallery->getPath();?>" width="400">
                    </div>

                </div>
            
            </div>

        </form>
    </div>
    <!-- /.card-body -->
</div>