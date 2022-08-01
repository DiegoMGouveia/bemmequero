<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

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
                      
                      <th class="col-1">ID</th>
                      <th class="col-1">Imagem</th>
                      <th class="col-3" >Nome do Serviço</th>
                      <th class="col-1">Preço</th>
                      <th class="col-5" >Descrição</th>
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
                          echo "<td>{$row['price']}</td>";
                          echo "<td class='w-auto p-3'>" . substr($row['description'], 0, 50) . "</td>";
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