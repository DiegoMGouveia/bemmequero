<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de serviços:</h3>

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
                      <th class="col-3 text-center">Nome do Serviço</th>
                      <th class="col-1 text-center">Preço</th>
                      <th class="col-5 text-center" >Descrição</th>
                      <th class="col-1 text-center" >Ação</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php 
                        // inicio do loop
                        
                        $servicesReturn = getAllServices($conn);

                        foreach($servicesReturn as $row){
                          
                          echo "<div class='container'>";
                          echo "<tr>";
                          echo "<td>{$row['serviceID']}</td>";
                          echo "<td><img src='" . $row['image'] . "' alt='{$row['name']}' width='150'></td>";
                          echo "<td>{$row['name']}</td>";
                          echo "<td class='text-center'>R\${$row['price']}</td>";
                          echo "<td class='w-auto p-3'>" . substr($row['description'], 0, 80) . "</td>";
                          echo "<td class='center'><a href='admincp.php?service={$row['serviceID']}'><button type='submit' class='bg-success'>Ver</button></a><a href='admincp.php?delService={$row['serviceID']}'><button type='submit' class='bg-danger'>Deletar</button></a></td>";
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