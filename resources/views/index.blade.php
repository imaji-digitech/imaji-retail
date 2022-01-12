<x-user>
    <x-slot name="css">
        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }

            body {
                padding: 0 !important;
                margin: 0 !important;
                transform: translate3d(0px, 0px, 0px);
                transition: all 700ms ease;
                color: white;
            }
        </style>
    </x-slot>
    <div>

        <div class="scroll-container">
            <section>
                <header id="image" class="d-flex h-100">
                    <div class=" row justify-content-center align-self-center col-md-12" style="z-index: 3;">
                        <h1 style="text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">Sociopreneur
                            Community</h1>
                        <h2 style="text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">Setiap produk
                            yang kami
                            ciptakan berasal dari semangat kreatifitas melalui pemberdayaan masyarakat desa
                            dan peningkatan perekonomian desa</h2>
                    </div>
                    <div class=layer></div>
                </header>
            </section>
            <section>
                <div id="" class="d-flex h-100 bg-2 align-content-center" style="text-align: center;">
                    <div class="row justify-content-center align-self-center col-md-12"
                         style="justify-content: center;">
                        <h2>Produk Kami</h2>
                        <div class="row  col-md-12 col-sm-12" style="justify-content: center;">
                            <div class="col-md-3 col-m-4 shape">
                                <a href="{{route('user.kopi')}}">
                                    <img src="{{asset('user/images/pesantren_kopi.png')}}" alt="" srcset="">
                                </a>
                                <br>
                                <p>Pesantren Kopi</p>
                            </div>
                            <div class="col-md-3 col-m-4 shape">
                                <a href="{{route('user.suburganic ')}}">
                                    <img src="{{asset('user/images/suburganic.png')}}" alt="" srcset="">
                                </a>
                                <br>
                                <p>Pupuk Suburganic</p>
                            </div>
                            <div class="col-md-3 col-m-4 shape">
                                <a href="">
                                    <img src="{{asset('user/images/jatiwangi.png')}}" alt="" srcset="">
                                </a>
                                <br>
                                <p>Furnitur Jatiwangi</p>
                            </div>
                            <div class="col-md-3 col-m-4 shape">
                                <a href="">
                                    <img src="{{asset('user/images/selo maeso.')}}png" alt="" srcset="">
                                </a>
                                <br>
                                <p>Batik Selo Maeso</p>
                            </div>
                            <div class="col-md-3 col-m-4 shape">
                                <a href="">
                                    <img src="{{asset('user/images/swajaya.png')}}" alt="" srcset="">
                                </a>
                                <br>
                                <p>Genteng Swajaya Karya</p>
                            </div>
                            <div class="col-md-3 col-m-4 shape">
                                <a href="">
                                    <img src="{{asset('user/images/bumdes.png')}}" alt="" srcset="">
                                </a>
                                <br>
                                <p>Retail Trijaya</p>
                            </div>
                            <div class="col-md-3 col-m-4 shape">
                                <a href="">
                                    <img src="{{asset('user/images/bagon.png')}}" alt="" srcset="">
                                </a>
                                <br>
                                <p>Bag On Craft Rajut</p>
                            </div>

                        </div>
                    </div>

                </div>
            </section>
            <section style="background-color:yellow">
                <div id="" class="d-flex h-100 bg-3" style="text-align: center;">
                    <div class=" row justify-content-center align-self-center col-md-12">
                        <h2 style=" font-weight: bold;">MILIKI PRODUK KAMI <br> DAN DAPATKAN PELAYANAN TERBAIK
                            KAMI
                        </h2>
                        <h3>Temui Produk Kami <br> di </h3>
                        <div>
                            <span>
                            <a href="https://shopee.co.id/imaji_sociopreneur?v=77e&smtt=0.0.3" class="e-commerce">
                                <img src="{{asset('user/images/shopee.png')}}" alt="" style="height: 50px; width:50px">
                            </a>
                            </span>
                            <span>
                            <a href="https://s.lazada.co.id/s.UdzpB" class="e-commerce">
                                <img src="{{asset('user/images/lazada.png')}}" alt="" style="height: 50px; width:50px">
                            </a>
                            </span>
                            <span>
                            <a href="https://www.bukalapak.com/u/imaji_sociopreneur_581384" class="e-commerce">
                                <img src="{{asset('user/images/bukalapak.png')}}" alt=""
                                     style="height: 50px; width:50px">
                            </a>
                            </span>
                            <span>
                            <a href="https://www.tokopedia.com/imaji-sociopreneur?_branch_match_id=981471491296911131&utm_source=sellerchannel&utm_campaign=Shop-0-11497559-0&utm_medium=share"
                               class="e-commerce">
                                <img src="{{asset('user/images/tokopedia.png')}}" alt=""
                                     style="height: 50px; width:50px">
                            </a>
                            </span>
                        </div>
                        <div class="col-sm-12 mt-5">
                            <a href="https://api.whatsapp.com/send?phone=6282335456772" class="e-commerce">
                                <img src="{{asset('user/images/contact_with_us.png')}}" alt="" style="height: 50px;">
                            </a>
                        </div>
                    </div>

                </div>
            </section>
        </div>
        <script>
            var counter = 1; //instantiate a counter
            var maxImage = 4; //the total number of images that are available
            setInterval(function () {
                document.querySelector('header').style.backgroundImage = "url('user/images/" + (counter + 1) + ".jpg')";
                if (counter + 1 == maxImage) {
                    counter = 0; //reset to start
                } else {
                    ++counter; //iterate to next image
                }
            }, 3000);


        </script>
    </div>

</x-user>
