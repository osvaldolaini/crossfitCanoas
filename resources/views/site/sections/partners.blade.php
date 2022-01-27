    <!-- ======= Partners Section ======= -->
    <section id="apiPartners" class="section partners mb-0 pb-0">
        <div class="container-fluid" >
            <div class="apiPartners"></div>
        </div>
    </section><!-- End Partners Section -->
    <script>
        async function fetchAsync () {
            let apiUrl = API_URL+'/api/apiPartners'
            let res = await fetch(apiUrl)
            let response = await res.json()
            console.log(response.data)
            $('.apiPartners').ready(function() {
                $(".apiPartners").append(
                    '<div class="partners-carousel"></div>'
                ) 
                        response.data.forEach(partner => {
                            $(".partners-carousel").append(
                                '<a href="'+partner.link+'" target="_BLANK">'+
                                    '<picture class="lazyload">'+
                                        '<source data-srcset="'+partner.png+'" />'+
                                        '<source data-srcset="'+partner.webp+'"/>'+
                                        '<img data-src="'+partner.png+'" class="lazyload" alt="'+partner.slug+'" />'+
                                    '</picture >'+
                                '</a>'
                            )
                        });
                        $('.partners-carousel').addClass(' owl-carousel')
                        $(".partners-carousel").owlCarousel({
                            autoplay: true,
                            //dots: true,
                            loop: true,
                            responsive: {
                                0: {
                                    items: 2
                                },
                                768: {
                                    items: 4
                                },
                                900: {
                                    items: 6
                                }
                            }
                        });
            })
        }
        fetchAsync()
    </script>
