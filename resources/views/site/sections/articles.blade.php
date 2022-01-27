    <!-- ======= Courses Section ======= -->
    <section class="custom-section articles-section" id="portfolio">
        <div class="container">
            <div class="row pb-5">
                <div class="col">
                    <div class="section_title_container">
                        <div class="section_title text-center">
                            <h1>Notícias</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row article blog align-items-stretch"></div>
            <div class="row">
                <div class="col text-center">
                    <div class="button team_button"><a href="{{url('noticias')}}">Veja mais</a></div>
                </div>
            </div>
            
            
            @include('site.partials.adsPlayer')
            <script>
                async function fetchAsync () {
                    let apiUrl = API_URL+'/api/apiArticles'
                    let res = await fetch(apiUrl)
                    let response = await res.json()
                    console.log(response.data)
                    $('.article').ready(function() {
                                var id = 0
                                response.data.forEach(article => {
                                    id += 1
                                    switch (id) {
                                        case 1:
                                            var col = 'col-lg-8';
                                            break;
                                        case 4:
                                            var col = 'col-lg-8';
                                            break;
                                        default:
                                            var col = 'col-lg-4';
                                            break;
                                    }

                                    $(".article").append(
                                        '<div class="col-sm-6 col-md-6 '+col+' blog-post-entry " data-aos="fade-up" data-aos-delay="0">'+
                                            '<a href="'+article.slug+'" class="grid-item blog-item w-100 h-100">'+
                                                '<div class="overlay">'+
                                                    '<div class="blog-item-content">'+
                                                        '<h3>'+article.title+'</h3>'+
                                                        '<p class="post-meta">Postado em <span class="small"></span> '+ article.created_at +
                                                            '<span class="small"> &bullet; </span> <i class="fas fa-eye"></i> ' + article.clicks +
                                                        '</p>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<picture class="lazyload img-fluid">'+
                                                    '<source data-srcset="'+article.jpg+'" />'+
                                                    '<source data-srcset="'+article.webp+'"/>'+
                                                    '<img data-src="'+article.webp+'" class="lazyload img-fluid" alt="'+article.alt+'" />'+
                                                '</picture >'+
                                            '</a>'+
                                        '</div>'
                                    )
                                })
                                
                    })
                }
                fetchAsync()
            </script>
        </div>
    </section><!-- End Courses Section -->

