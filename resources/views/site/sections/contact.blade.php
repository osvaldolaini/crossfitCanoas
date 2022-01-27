<!-- ======= Contact Section ======= -->
<section class="custom-section py-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 wrap-about py-md-5 custom-animate d-none d-lg-block">
                <div class="heading-section pr-md-5">
                    <h2 class="mb-4">{{$config->title}}</h2>
                    {{$config->meta_description}}
                </div>
            </div> 
            <div class="col-lg-7 order-md-last d-md-flex align-items-stretch">
                <div class="img w-100 img-2 mr-md-2 d-none d-lg-block" style="background-image: url({{ url('storage/images/about/about.jpg') }});"></div>
                <div class="img w-100 img-2 img-overlay ml-md-2 p-4" style="background-image: url({{ url('storage/images/about/about.jpg') }});">
                    <div class="request-quote py-1">
                        <div class="py-2">
                            <span class="subheading">Fale conosco</span>
                        </div>
                        <form method="post" class="request-form custom-animate" id="contactForm">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Seu nome" id="name">
                            </div>

                            <div class="form-group">
                                <input type="text" name="phone" class="form-control phones" placeholder="Contato " id="phone">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" id="email">
                            </div>
                            <div class="form-group">
                                <textarea name="message" cols="30" rows="5" class="form-control"
                                    placeholder="Mensagem" id="message"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Enviar" class="button team_button py-3 px-4">
                            </div>
                        </form>
                        <div id="form-message-warning" class="mt-4"></div>
                        <div id="form-message-success">
                            <p>Sua mensagem foi enviada, obrigado!</p>
                            <p>Em alguns dias nossa equipe entrará em contato.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Contact Section -->
