   <!-- ======= Sub page header Section ======= -->
   <section class="subpages-header jarallax" style="background-image: url({{ url('storage/images/subpages/' .$img_jarallax) }});">
       <div class="overlay"></div>
       <div class="container pb-0">
            <div class="row no-gutters subpages-content align-items-end" >
                <div class="col-md-9">
                    <p class="breadcrumbs">
                       <span class="mr-2">
                        <a href="{{ url('') }}">
                            Home <i class="fa fa-chevron-right"></i>
                        </a>
                        </span>
                        @if (isset($subtext))
                            <span>
                                <a href="{{ url($sublink) }}">
                                    {{ ucwords(mb_strtolower($subtext)) }} <i class="fa fa-chevron-right"></i>
                                </a>
                            </span>
                        @endif
                    </p>
                    <h1 class="bread">{{ ucwords(mb_strtolower($title_postfix)) }}</h1>
                </div>
            </div>
       </div>
   </section>
