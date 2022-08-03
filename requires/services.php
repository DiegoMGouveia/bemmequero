 <!-- SERVICES 
=================-->
<section id="services" class="services">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12 text-center mb-5">
                <div class="heading wow fadeInUp" data-wow-delay="0.3s">
                    <h1>Serviços</h1>
                    <div class="bord-bot"></div>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <!-- inicio da lista de serviços -->
            <?php
                $servicesReturn = getAllServices($conn);
                foreach($servicesReturn as $row){
                    echo "<div class='col-md-3 mt-2 col-sm-6'>";
                    echo    "<div class='service-cont wow fadeInUp' data-wow-delay='0.3s'>";
                    echo        "<img src='{$row['image']}' alt='{$row['name']}' class='img-fluid'>";
                    echo        "<div class='service-desc'> {$row['name']} <p>R$ {$row['price']}</p></div>";
                    echo    "</div>";
                    echo "</div>";

                }

                ?>
            
        </div>
    </div>
</section>
