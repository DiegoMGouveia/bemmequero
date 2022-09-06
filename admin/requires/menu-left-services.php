<li class="nav-item <?php $class = getOPenServiceMenu();  echo $class; ?>">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-edit"></i>
        <p>
        Serviços
        <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
        <a href="?newservice" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Novo Serviço</p>
        </a>
        </li>
        <li class="nav-item">
        <a href="?services" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Ver Serviços</p>
        </a>
        </li>

        <ion-icon name="desktop-outline"></ion-icon>
        
    </ul>
</li>