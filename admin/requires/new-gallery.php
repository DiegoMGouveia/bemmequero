<?php 

    if (isset($_GET["gallery"]))
    {
        ?>
<!-- general form elements disabled -->
<div class="card card-warning">
    <div class="card-header">
    <h3 class="card-title">Nova Imagem</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <form action="admincp.php?newgallery" method="POST" enctype="multipart/form-data">
        <div class="row">
        <div class="col-sm-6">
            <!-- nome input -->
            <div class="form-group">
            <label>Titulo da imagem</label>
            <input type="text" class="form-control" name="inputNameGallery" placeholder="Digite o titulo da imagem ..."  required>
            </div>
        </div>
        
        </div>

        <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <!-- <label for="customFile">Custom File</label> -->

                <div class="custom-file">
                    <input type="file" accept="image/*" class="custom-file-input" name="inputImageGallery" id="imageGallery">
                    <label class="custom-file-label" for="inputImageGallery">Escolha uma imagem...</label>
                </div>
            </div>
            <button type="submit" name="gallerySend" class="btn btn-primary">Postar Imagem</button>

        </div>
        
        </div>

    </form>
    </div>
    <!-- /.card-body -->
</div>
<?php
    }
