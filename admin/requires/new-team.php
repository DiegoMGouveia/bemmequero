<?php
if (isset($_GET["team"]))
{
    
    if (isset($_POST["teamSend"]))
    {


        $NewTeam = new Team(null, $_POST["inputNameTeam"], $_FILES["inputImageTeam"], $_POST["inputFaceTeam"], $_POST["inputWhatsTeam"], $_POST["inputInstaTeam"], $_POST["inputFuncTeam"]);
        
        $Team = setTeam($NewTeam, $conn);
        if($Team)
        {
            

            $success = "<p>Profissional cadastrado com sucesso!</p>";
        }


    }
    ?>
    <!-- general form elements disabled -->
    <div class="card card-warning">
        <div class="card-header">
        <h3 class="card-title">Novo Profissionais</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <form action="admincp.php?team" method="POST" enctype="multipart/form-data">
            <div class="row">
            <div class="col-sm-6">
                <!-- nome input -->
                <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" name="inputNameTeam" placeholder="Digite o nome do(a) profissional..." required>
                </div>
            </div>

            
            </div>
            
            <div class="row">

                <div class="col-sm-3">
                    <!-- Facebook input -->
                    <div class="form-group">
                    <label>Facebook</label>
                    <input type="text" class="form-control" name="inputFaceTeam" placeholder="Digite o facebook do(a) profissional...">
                    </div>
                </div>

            </div>
            
            <div class="row">

                <div class="col-sm-3">
                    <!-- Função input -->
                    <div class="form-group">
                    <label>Função</label>
                    <input type="text" class="form-control" name="inputFuncTeam" placeholder="Digite o facebook do(a) profissional...">
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-sm-3">
                    <!-- Instagram input -->
                    <div class="form-group">
                    <label>Instagram</label>
                    <input type="text" class="form-control" name="inputInstaTeam" placeholder="Digite o Instagram do(a) profissional...">
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-sm-3">
                    <!-- WhatsApp input -->
                    <div class="form-group">
                    <label>WhatsApp</label>
                    <input type="text" class="form-control" name="inputWhatsTeam" placeholder="Digite o WhatsApp do(a) profissional...">
                    </div>
                </div>

            </div>

                <!-- Imagem input -->
                <div class="form-group">
                
                    <div class="col-sm-6 custom-file">
                        <input type="file" accept="image/*" class="custom-file-input" name="inputImageTeam" id="imageTeam">
                        <label class="custom-file-label" for="inputImageTeam">Escolha uma imagem...</label>
                    </div>
                </div>
                <!-- botão Enviar -->
                <button type="submit" name="teamSend" class="btn btn-success">Adicicionar Profissional</button>





            
            </div>

        </form>
        </div>
        <!-- /.card-body -->
    </div>

    <?php
    if(isset($success))
    {
        echo $success;
    }
}
?>