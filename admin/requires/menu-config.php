<li class="nav-item <?php $class = getOPenConfigMenu();  echo $class; ?>">
    <a href="#" class="nav-link">
        <!-- <i class="nav-icon fas fa-edit"></i> -->
        <i class="nav-icon fas fa-thin fa-globe"></i>
        <p>
        Configurações
        <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
        <a href="?config" class="nav-link <?php if($pageActive === "config" || $pageActive === "configsuccess") { echo "active";} ?>">
            <i class="far fa-circle nav-icon"></i>
            <p>Dados da Página</p>
        </a>
        </li>
        <li class="nav-item">
        <a href="?about" class="nav-link <?php if($pageActive === "about") { echo "active";} ?>">
            <i class="far fa-circle nav-icon"></i>
            <p>Sobre Nós</p>
        </a>
        </li>
        <li class="nav-item">
        <a href="?team" class="nav-link <?php if($pageActive === "team") { echo "active";} ?>">
            <i class="far fa-circle nav-icon"></i>
            <p>Profissionais</p>
        </a>
        </li>
        <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Especialidade</p>
        </a>
        </li>

        
    </ul>
</li>