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

        if(!empty($_FILES)){ // Se o array $_FILES não estiver vazio

            // Associamos a classe à variável $upload
            $upload = new UploadImagem();
            // Determinamos nossa largura máxima permitida para a imagem
            $upload->width = 500;
            // Determinamos nossa altura máxima permitida para a imagem
            $upload->height = 500;
            
            // Exibimos a mensagem com sucesso ou erro retornada pela função salvar.
            //Se for sucesso, a mensagem também é um link para a imagem enviada.
            $resultUpload = $upload->salvar("img/portfolio/", $_FILES['inputImageGallery']);
            if ( is_array($resultUpload))
            {
                $NewGallery = new Gallery($_POST["inputTitleGallery"], $resultUpload[1], date("Y.m.d-H.i.s"));
                $insertResult = insertNewGallery($NewGallery, $conn);
                echo "Foto publicada com sucesso!";


            }
            // var_dump($resultUpload);
        }

      }


    // lista de imagens
    } elseif (isset($_GET["gallerys"]))
    {

        // irá listar todos as imagens cadastrado no banco de dados.
        require("admin/requires/list-images.php");

    } elseif (isset($_GET["selgallery"]))
    {

        // irá mostrar informações de um serviço cadastrado no banco de dados.
        require("admin/requires/service.php");

    } elseif (isset($_GET["delGallery"]))
    {

        // irá perguntar se o usuário deseja deletar um serviço cadastrado no banco de dados.
        require("admin/requires/delGlry.php");

    } elseif(isset($_GET["delGlry"]))
    {
        
        $deleted = delGallery($conn);
        if ($deleted == true)
        {

            require("admin/requires/confirmDelGalleryMsg.php");

        }

    }