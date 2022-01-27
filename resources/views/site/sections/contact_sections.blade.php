<!-- ======= Contact Section ======= -->
<section class="custom-section py-0 contact_sections jarallax" style="">
    <div class="container">
        
        <div class="row py-5">
            <div class="col">
                <div class="section_title_container">
                    <div class="section_title text-center">
                        <h1>FALE CONOSCO</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-between">
            <div class="col-md-6 ">
                <form method="post" class="form-outline-style" id="contactForm" >
                    <div class="form-group row mb-0">
                        <div class="col-lg-6 form-group ">
                            <label for="name">Nome</label>
                            <input name="name" type="text" class="form-control" id="name">
                        </div>
                        <div class="col-lg-6 form-group ">
                            <label for="name">Contato</label>
                            <input name="phone" type="text" class="form-control phones" id="phone">
                        </div>
                        <div class="col-lg-12 form-group ">
                            <label for="email">Email</label>
                            <input name="email" type="email" class="form-control" id="email">
                        </div>
                        <div class="col-lg-12 form-group ">
                            <label for="message">Escreva sua mensagem...</label>
                            <textarea name="message" id="message" cols="30" rows="7" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row "> 
                        <div class="col-md-12 d-flex align-items-center">
                            <input type="submit" class="button team_button" value="Enviar">
                        </div>
                    </div>
                </form>
                <div id="form-message-warning" class="mt-4"></div>
                <div id="form-message-success">
                    <p>Sua mensagem foi enviada, obrigado!</p>
                    <p>Em alguns dias nossa equipe entrará em contato.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-info pt-0 mt-0">
                    <div >
                        <span class="d-block contact-info-label">
                            <i class="fas fa-mail-bulk"></i>
                            Email
                        </span>
                        {{ $config->email }}
                    </div>
                    <div class=" d-block">
                        <span class="d-block contact-info-label">
                            <i class="fab fa-whatsapp"></i>
                            Fone
                        </span>{{ $config->phone }}
                    </div>
                    <div class="gsap-reveal d-block">
                        <span class="w-100 contact-info-label">Nossas redes sociais</span>
                        <div class="row text-center">
                            <div class="col-lg-12 ">
                                @if (isset($menu['socialMedias']))
                                    @foreach ($menu['socialMedias'] as $socialMedia)
                                            <a class=" pr-1" title="Siga nossas redes sociais" href="{{$socialMedia->link}}" target="_blank" data-aos="fade-up" data-aos-easing="ease-in-sine">
                                                <i class="fab fa-3x {{$socialMedia->icon}}-square"></i>
                                            </a>
                                    @endforeach
                                @endif
                                <a class="" title="fale com o LOKOMOTIV pelo whatsapp" href="https://web.whatsapp.com/send?phone=55{{$config->whatsapp}}" target="_blank" data-aos="fade-up" data-aos-easing="ease-in-sine">
                                    <i class="fab fa-3x fa-whatsapp-square"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section><!-- End Contact Section -->
