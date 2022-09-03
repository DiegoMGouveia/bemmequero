<?php
if (isset($_GET["about"]))
{
    $About = getAbout($conn);

    if (isset($_POST["aboutSend"]))
    {



    }
    ?>
    <!-- general form elements disabled -->
    <div class="card card-warning">
        <div class="card-header">
        <h3 class="card-title">Sobre Nós</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <form action="admincp.php?about" method="POST" enctype="multipart/form-data">
            <div class="row">
            <div class="col-sm-6">
                <!-- nome input -->
                <div class="form-group">
                <label>Titulo</label>
                <input type="text" class="form-control" name="inputTitleAbout" placeholder="Digite o nome do site..." value= "<?php echo $About->getTitle(); ?>" required>
                </div>
            </div>

            
            </div>
            
            <div class="row">

                <div class="col-sm-3">
                    <!-- Preço input -->
                    <div class="form-group">
                    <label>Descrição</label>
                    <textarea class="form-control" name="inputDescriptionAbout" rows="3" required><?php echo $About->getDescription();?></textarea>
                    </div>
                </div>



            </div>


                <div class="form-group">
                
                    <div class="col-sm-6 custom-file">
                        <input type="file" accept="image/*" class="custom-file-input" name="inputImageAbout" id="imageAbout">
                        <label class="custom-file-label" for="inputImageAbout">Escolha uma nova logo...</label>
                    </div>
                </div>
                <button type="submit" name="aboutSend" class="btn btn-success">Atualizar informações</button>





            
            </div>

        </form>
        </div>
        <!-- /.card-body -->
    </div>

    <?php
}
?>