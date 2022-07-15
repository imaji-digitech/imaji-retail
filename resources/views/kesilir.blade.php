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
            @media (max-width: 768px) {
                .shape img {
                    width: 160px;
                    height: auto;
                }
            }

            body {
                padding: 0 !important;
                margin: 0 !important;
                transform: translate3d(0px, 0px, 0px);
                transition: all 700ms ease;
                color: white;
            }
            p{
                margin: 10px;
            }

            .shape img {
                border: 3px solid rgb(134, 79, 8)
            }
        </style>
    </x-slot>
    <div>
        <div class="scroll-container">
            <section>
                <header id="image-4" class="d-flex h-100">
                    <div class=" row justify-content-center align-self-center col-md-12" style="z-index: 3;">
                        <h1 style="text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">
                            Meubel Jati Wangi
                        </h1>
                        <p style="text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;" class="col-md-8">
                            Produk furniture meja, kursi, ranjang, almari, hingga sofa berbahan dasar kayu jati berkualitas dan dikerjakan oleh pengrajin berpengalaman sejak 25 tahun lalu.
                            Bekerja sama dengan Sukirno warga Desa Kesilir, Kecamatan Wuluhan, Kabupaten Jember pemilik Jati Wangi, kami berkomitmen menghasilkan produk berkualitas dan berbahan 100 persen kayu jati pilihan. Bukan hanya semangat entrepreneur, kami juga berkomitmen memberdayakan dan memberikan alternatif income bagi masyarakat sekitar.
                        </p>
                    </div>
                    <div class=layer></div>
                </header>
            </section>
            <section>
                <div id="" class="d-flex h-100 bg-a-2" style="text-align: center;">
                    <div class=" row justify-content-center align-self-center col-md-12">
                        <h2>Produk Kita</h2>
                        <div class="row col-md-12 col-sm-12" style="justify-content: center;">
                            <div class="col-md-4 col-m-4 shape">
                                <img src="{{asset('user/images/kesilir_5.jpg')}}" alt="" srcset="">
                                <br>
                                <p>Batik Ecoprint</p>
                            </div>
                            <div class="col-md-4 col-m-4 shape">
                                <img src="{{asset('user/images/kesilir_9.jpg')}}" alt="" srcset="">
                                <br>
                                <p>Batik Motif Selo Maeso</p>
                            </div>
                            <div class="col-md-4 col-m-4 shape">
                                <img src="{{asset('user/images/kesilir_6.jpg')}}" alt="" srcset="">
                                <br>
                                <p>Batik Pewarna Alam</p>
                            </div>
                        </div>
                        <div class="row col-md-12 col-sm-12" style="justify-content: center;">
                            <div class="col-md-4 col-m-4 shape">
                                <img src="{{asset('user/images/kesilir_7.jpg')}}" alt="" srcset="">
                                <br>
                                <p>Batik Tulis</p>
                            </div>
                            <div class="col-md-4 col-m-4 shape">
                                <img src="{{asset('user/images/kesilir_8.jpg')}}" alt="" srcset="">
                                <br>
                                <p>Batik Cap</p>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

{{--            <section>--}}
{{--                <div id="" class="d-flex h-100 bg-a-3">--}}
{{--                    <div class=" row justify-content-center align-self-center col-md-12">--}}
{{--                        <h2 style="text-align: center;">Tentang Kami</h2>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <p style="text-align: justify;text-indent: 50px;">--}}
{{--                                Bersama kelompok batik Selo Maeso, saat ini kami tengah mengembangkan motif batik 'Selo Maeso' atau 'Watukebo' dalam bahasa Sanskerta; motif yang didasarkan cerita sejarah Dusun Watukebo, Desa kesilir, Kecamatan Ambulu, Jember. Tetap mengusung motif khas Jember, yakni tembakau sebagai kondimen dasar, motif Selo Maeso didominasi unsur batu dan kepala kerbau yang mencerminkan ‘kekuatan’ dan ‘keikhlasan’ manusia. Selain batik tulis, terdapat pula batik cap dan batik pewarna alami. Setiap produk batik yang dihasilkan turut mengandung semangat untuk melestarikan warisan budaya dan memberdayakan perempuan di sekitar desa.--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </section>--}}
        </div>
        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }

            var counter = 1; //instantiate a counter
            var maxImage = 3; //the total number of images that are available
            setInterval(function () {
                document.querySelector('header').style.backgroundImage = "url('user/images/kesilir_" + (counter + 1) +
                    ".jpg')";
                if (counter + 1 == maxImage) {
                    counter = 0; //reset to start
                } else {
                    ++counter; //iterate to next image
                }
            }, 3000);
        </script>
    </div>

</x-user>
