<li class="nav-item <?php $class = getOPenUserMenu();  echo $class; ?>">
    <a href="#" class="nav-link">
        <!-- <i class="nav-icon fas fa-edit"></i> -->
        <i class="nav-icon fas fa-thin fa-users"></i>
        <p>
        Usuários
        <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
        <a href="?mailtest" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Novo Usuário</p>
        </a>
        </li>
        <li class="nav-item">
        <a href="?listusers" class="nav-link <?php if($pageActive === "listusers" || $pageActive === "seluser" || $pageActive === "deleteUsr") { echo "active";} ?>">
            <i class="far fa-circle nav-icon"></i>
            <p>Ver Usuários</p>
        </a>
        </li>

        
    </ul>
</li>



<!-- nav-item menu-is-opening menu-open -->