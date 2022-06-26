<!-- CONTACT FORM
=================-->
<section id="contact" class="contact pb-0">
    <div class="container"> 
    <div class="row mb-5">
        <div class="col-md-12 text-center">
            <div class="heading">
                <h1>Contate nos</h1>
                <div class="bord-bot"></div>
                <p class="desc">Gostaríamos muito de ouvir de você!</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <form id="contactForm" name="sentMessage" novalidate>
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <input class="form-control" id="name" type="text" placeholder="Seu nome *" required data-validation-required-message="Por favor, escreva seu nome.">
                <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                <input class="form-control" id="email" type="email" placeholder="Seu e-mail *" required data-validation-required-message="Por favor, escreva seu e-mail.">
                <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                <input class="form-control" id="phone" type="tel" placeholder="Seu celular *" required data-validation-required-message="Por favor escreva seu celular.">
                <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <textarea class="form-control" id="message" placeholder="Sua mensagem*" required data-validation-required-message="Por favor, escreva uma mensagem."></textarea>
                <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-12 text-center">
                <div id="success"></div>
                <button id="sendMessageButton" class="btn btn-general btn-greenish btn-xl text-uppercase" type="submit"  style="color:white; border-color: white;">Enviar mensagem</button>
            </div>
            </div>
        </form>
        </div>
    </div>
    </div>
