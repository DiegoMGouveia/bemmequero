<!-- ABOUT 
=================-->
<section id="about" class="about">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12 text-center ">
                <div class="heading wow fadeInUp" data-wow-delay="0.3s">
                    <h1>Sobre Nós</h1>
                    <div class="bord-bot"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 my-auto">
                <div class="body-cont mb-6 wow fadeInUp" data-wow-delay="0.6s">
                    <h3><?php echo $About->getTitle();?></h3>
                    <div class="bord-bottom"></div>
                    <p><?php echo $About->getDescription();?></p>
                    <a href="#contact" class="img-fluid js-scroll-trigger"><button class="btn btn-general btn-white">Contate-nos</button></a>
                </div>
            </div>
            <div class="col-md-8 m-auto text-center">
                <div class="body-img-1 wow fadeInUp" data-wow-delay="0.9s">
                    <img src="<?php echo $About->getImage();?>" alt="" class="img-fluid">
                </div>
            </div>
        </div> 
    </div>
</section> 
