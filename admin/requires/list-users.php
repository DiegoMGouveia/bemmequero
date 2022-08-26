<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de Usuários:</h3>

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
                      <th class="col-1 text-center">Nome</th>
                      <th class="col-1 text-center">Categoria</th>
                      <th class="col-3 text-center">Documento</th>
                      <th class="col-1 text-center">Celular</th>
                      <th class="col-5 text-center" >E-mail</th>
                      <th class="col-5 text-center" >Carteira</th>
                      <th class="col-1 text-center" >Ação</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php 
                        // inicio do loop
                        
                        $servicesReturn = getAllUsers($conn);

                        foreach($servicesReturn as $row){
                          
                          echo "<div class='container'>";
                          echo "<tr>";
                          echo "<td>{$row['user_id']}</td>";
                          echo "<td>{$row['name']}</td>";
                          echo "<td>{$row['type']}</td>";
                          echo "<td>{$row['document']}</td>";
                          echo "<td>{$row['cellphone']}</td>";
                          echo "<td>{$row['mail']}</td>";
                          echo "<td>{$row['wallet']}</td>";
                          echo "<td class='center'><a href='admincp.php?seluser={$row['user_id']}'><button type='submit' class='bg-success'>Ver</button></a><a href='admincp.php?deleteUsr={$row['user_id']}'><button type='submit' class='bg-danger'>Deletar</button></a></td>";
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