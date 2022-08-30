<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de Imagens:</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap w-auto">
                  <thead>
                    <tr>
                      
                      <th class="col-1 text-center">ID</th>
                      <th class="col-1 text-center">Imagem</th>
                      <th class="col-1 text-center">Titulo</th>
                      <th class="col-1 text-center">Likes</th>
                      <th class="col-1 text-center" >Data</th>
                      <th class="col-1 text-center" >Ação</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php 
                        // inicio do loop
                        
                        $galleryReturn = getAllPhotos($conn);

                        foreach($galleryReturn as $row){
                          
                          echo "<div class='container'>";
                          echo "<tr>";
                          echo "<td class='col-1 text-center'>{$row['galleryID']}</td>";
                          echo "<td class='col-1 text-center'><img src='" . $row['path'] . "' alt='{$row['title']}' width='150'></td>";
                          echo "<td class='col-1 text-center'>{$row['title']}</td>";
                          echo "<td  class='col-1 text-center'>{$row['likes']}</td>";
                          echo "<td class='col-1 text-center'>{$row['date']}</td>";
                          echo "<td class='col-1 text-center'><a href='admincp.php?editPhoto={$row['galleryID']}'><button type='submit' class='bg-success'>Ver</button></a><a href='admincp.php?delGallery={$row['galleryID']}'><button type='submit' class='bg-danger'>Deletar</button></a></td>";
                          echo "</tr>";
                          echo "</div>";
                          

                      }

                      ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->