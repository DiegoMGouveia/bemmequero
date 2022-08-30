<!-- PORTFOLIO 
=================-->
<section id="portfolio" class="portfolio pb-0 pt-5">
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-md-12 text-center mb-3">
                <div class="heading wow fadeInUp" data-wow-delay="0.3s">
                    <h1>O estilo de nossos clientes</h1>
                    <div class="bord-bot"></div>
                </div>
            </div>
        </div>
        <div class="row">

            <?php 

            $galleryReturn = getAllPhotos($conn);

            foreach($galleryReturn as $row){
                ?>
              
            <div class="col-md-3 col-sm-6 p-0">
                <div class="port-cont">
                    <a href="<?php echo $row['path'] ?>" title="<?php echo $row['title'] ?>">
                        <img src="<?php echo $row['path'] ?>" alt="<?php echo $row['title'] ?>" class="img-fluid">
                    </a>
                </div>
            </div>

            <?php 
            } 
            ?>

        </div>
    </div>
</section>
