<?php
if (isset($_GET["about"]))
{
    $Team = getAbout($conn);

    if (isset($_POST["teamSend"]))
    {



    }
    ?>
    <!-- general form elements disabled -->
    <div class="card card-warning">
        <div class="card-header">
        <h3 class="card-title">profissionais</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <form action="admincp.php?team" method="POST" enctype="multipart/form-data">
            <div class="row">
            <div class="col-sm-6">
                <!-- nome input -->
                <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" name="inputNameTeam" placeholder="Digite o nome do(a) profissional..." value= "<?php echo $Team->getName(); ?>" required>
                </div>
            </div>

            
            </div>
            
            <div class="row">

                <div class="col-sm-3">
                    <!-- Preço input -->
                    <div class="form-group">
                    <label>Função</label>
                    <textarea class="form-control" name="inputFunctionTeam" rows="3" required><?php echo $Team->getFunction();?></textarea>
                    <input type="text" class="form-control" name="inputFunctionTeam" placeholder="Digite a função do(a) profissional..." value= "<?php echo $Team->getFunction(); ?>" required>
                    </div>
                </div>



            </div>


                <div class="form-group">
                
                    <div class="col-sm-6 custom-file">
                        <input type="file" accept="image/*" class="custom-file-input" name="inputImageAbout" id="imageAbout">
                        <label class="custom-file-label" for="inputImageTeam">Escolha uma nova logo...</label>
                    </div>
                </div>
                <button type="submit" name="teamSend" class="btn btn-success">Atualizar informações</button>





            
            </div>

        </form>
        </div>
        <!-- /.card-body -->
    </div>

    <?php
}
?>