<?php
if (isset($_GET["config"]))
{
    $Config = getConfig($conn);

    if (isset($_POST["configSend"]))
    {

        $Config = new Config($_POST["inputNameSite"],$_POST["inputMailContact"],$_POST["inputPhoneContact"],$_POST["inputAddressContact"]);
        $result = updateConfig($Config, $conn);
        if($result === true)
        {
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=admincp.php?configsuccess'>";
        }


    }
    ?>
    <!-- general form elements disabled -->
    <div class="card card-warning">
        <div class="card-header">
        <h3 class="card-title">Configurações do site</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <form action="admincp.php?config" method="POST" enctype="multipart/form-data">
            <div class="row">
            <div class="col-sm-6">
                <!-- nome input -->
                <div class="form-group">
                <label>Nome do Site</label>
                <input type="text" class="form-control" name="inputNameSite" placeholder="Digite o nome do site..." value= "<?php echo $Config->getName(); ?>" required>
                </div>
            </div>

            
            </div>
            
            <div class="row">

                <div class="col-sm-3">
                    <!-- Preço input -->
                    <div class="form-group">
                    <label>Telefone de Contato</label>
                    <input type="text" name="inputPhoneContact" class="form-control" placeholder="(53) 999999999" value= "<?php echo $Config->getPhone(); ?>" required>
                    </div>
                </div>


                <div class="col-sm-3">
                    <!-- Preço input -->
                    <div class="form-group">
                    <label>Email de Contato</label>
                    <input type="mail" name="inputMailContact" class="form-control" placeholder="contato@site.com.br" value= "<?php echo $Config->getMail(); ?>" required>
                    </div>
                </div>

            </div>


            <div class="col-sm-5">
                <!-- Preço input -->
                <div class="form-group">
                <label>Endereço fisico</label>
                <input type="text" name="inputAddressContact" class="form-control" placeholder="Digite o endereço do estabelecimento" value= "<?php echo $Config->getAddress(); ?>" required>
                </div>
            </div>

                <!-- <div class="form-group">
                

                    <div class="col-sm-6 custom-file">
                        <input type="file" accept="image/*" class="custom-file-input" name="inputImageService" id="imageService">
                        <label class="custom-file-label" for="inputImageService">Escolha uma nova logo...</label>
                    </div>
                </div> -->
                <button type="submit" name="configSend" class="btn btn-primary">Atualizar configurações</button>





            
            </div>

        </form>
        </div>
        <!-- /.card-body -->
    </div>

    <?php
} elseif (isset($_GET["configsuccess"]))
{
    require_once("admin/requires/update-sucess-config.php");
}
?>