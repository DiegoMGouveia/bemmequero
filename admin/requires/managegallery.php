<?php
    // novo serviço
    if (isset($_GET["newgallery"]))
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
                    <input type="text" class="form-control" name="inputTitleGallery" placeholder="Digite o titulo da imagem ..."  required>
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


    

      if (isset($_POST["gallerySend"]))
      {

        // back-end nova imagem
        $title = $_POST["inputTitleGallery"];
        $image = $_FILES["inputImageGallery"];
        // Manipulando arquivo de imagem
        $ext = strtolower(substr($image['name'],-4)); //Pegando extensão do arquivo
        $new_name = $title . date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
        $date = date("Y.m.d-H.i.s");
        $dir = 'img/portfolio/'; //Diretório para uploads 
        $newPath = $dir . $new_name;
        move_uploaded_file($image['tmp_name'], $newPath); //Fazer upload do arquivo

        $NewGallery = new Gallery($title, $newPath, $date);
        var_dump($NewGallery);

        $insertResult = insertNewGallery($NewGallery, $conn);

      }


    // lista de imagens
    } elseif (isset($_GET["gallerys"]))
    {

        // irá listar todos as imagens cadastrado no banco de dados.
        require("admin/requires/list-services.php");

    } elseif (isset($_GET["selgallery"]))
    {

        // irá mostrar informações de um serviço cadastrado no banco de dados.
        require("admin/requires/service.php");

    } elseif (isset($_GET["delGallery"]))
    {

        // irá perguntar se o usuário deseja deletar um serviço cadastrado no banco de dados.
        require("admin/requires/delService.php");

    } elseif(isset($_GET["deleteGlry"]))
    {
        
        $deleted = delGallery($conn);
        if ($deleted == true)
        {

            require("admin/requires/confirmDelServiceMsg.php");

        }

    }