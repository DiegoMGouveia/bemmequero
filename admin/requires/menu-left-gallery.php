<li class="nav-item <?php $class = getOPenGalleryMenu();  echo $class; ?>">
    <a href="pages/gallery.html" class="nav-link">
        <i class="nav-icon far fa-image"></i>
        <p>
        Gallery
        </p>
        <i class="fas fa-angle-left right"></i>

    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
        <a href="?newgallery" class="nav-link <?php if($pageActive === "newgallery") { echo "active";} ?>">
            <i class="far fa-circle nav-icon"></i>
            <p>Nova Imagem</p>
        </a>
        </li>
        <li class="nav-item">
        <a href="?gallerys" class="nav-link <?php if($pageActive === "gallerys" || $pageActive === "editPhoto" || $pageActive === "delGallery" || $pageActive === "delGlry") { echo "active";} ?>">
            <i class="far fa-circle nav-icon"></i>
            <p>Ver Imagens</p>
        </a>
        </li>
        
    </ul>
</li>