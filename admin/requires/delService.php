<div class="col-md-3">
    <div class="card card-danger">
        <div class="card-header">
        <h3 class="card-title">Atenção! Exclusão de Serviço!</h3>
        </div>
        <div class="card-body">
        Você tem certeza que deseja excluir este serviço? esta ação será irreversivel!

        <div>
            <a href="admincp.php?deleteServ=<?php echo $_GET['delService'];?>"><button type="submit" class="bg-danger">Sim, quero deletar!</button></a>
            <button type="submit" class="bg-warning">Não, quero voltar.</button>
        </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->