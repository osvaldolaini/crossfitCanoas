<!-- about_area_start -->
<div class="custom-section about-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xl-6 col-lg-6 mt-0 pt-0">
                <div class="about_info text-center" >
                    {{ $config->meta_description }}
                </div>
                <div class="read_more ">
                    <a href="{{url('sobre')}}" class="btn btn-outline-pill btn-custom-light">Saiba mais...</a>
                </div>
            </div> 
            <div class="col-xl-6 col-lg-6 d-none d-lg-block">
                <div class="about_thumb d-flex">
                    <div class="img_1 text-center">
                        <picture class="lazyload img-fluid ">
                            <source data-srcset="{{url('storage/images/site/logo_big.jpg')}}" />
                            <source data-srcset="{{url('storage/images/site/logo_big.webp')}}"/>
                            <img class="lazyload img-fluid w-75" data-src="{{url('storage/images/site/logo_big.webp')}}" alt="custom-about">
                        </picture>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about_area_end -->
