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
            .shape img{
                border:3px solid rgb(134, 79, 8)
        </style>
    </x-slot>
    <div>
        <div class="scroll-container">
            <section>
                <header id="image-1" class="d-flex h-100">
                    <div class=" row justify-content-center align-self-center col-md-12" style="z-index: 3;">
                        <h1 style="text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">Pesantren Kopi</h1>
                        <p style="text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;" class="col-md-8">
                            Ada cerita di setiap tegukan Pesantren Kopi. Kalimat ini bukan sekadar aforisme semata, setiap
                            biji kopi yang kami suguhkan memang memiliki cerita di baliknya. Cerita kami untuk terus
                            mengatasi permasalahan pendidikan, sosial, dan ekonomi yang hadir di tengah-tengah masyarakat
                            Desa Slateng. Dan cerita kami dalam mengupayakan kemandirian bagi masyarakat.
                            Pesantren Kopi hadir dengan citarasa kopi Raung terbaik dengan 3 varian produk, yakni medium
                            robusta, premium robusta, dan lanang. Tiap biji kopi yang kami hadirkan telah melewati proses
                            sortasi yang ketat demi menjaga citarasa dan kualitas.
                            Dapatkan produk pesantren kopi melalui marketplace dan Instagram @pesantrenkopi. Dapatkan cerita dari tiap
                            tegukan Pesantren Kopi.
                        </p>
                    </div>
                    <div class=layer></div>
                </header>
            </section>
            <section>
                <div id="" class="d-flex h-100 bg-k-2" style="text-align: center;">
                    <div class=" row justify-content-center align-self-center col-md-12">
                        <h2>Produk Kita</h2>
                        <div class="row container col-md-10 col-sm-8 mt-5">
                            <div class="col-md-4 col-m-4 shape">
                                <img src="{{asset('user/images/kopi_8.jpg')}}" alt="" srcset="">
                                <br>
                                <p>Premium Robusta</p>
                            </div>
                            <div class="col-md-4 col-m-4 shape">
                                <img src="{{asset('user/images/kopi_9.jpg')}}" alt="" srcset="">
                                <br>
                                <p>Medium Robusta</p>
                            </div>
                            <div class="col-md-4 col-m-4 shape">
                                <img src="{{asset('user/images/kopi_7.jpg')}}" alt="" srcset="">
                                <br>
                                <p>Lanang Robusta</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div id="" class="d-flex h-100 bg-k-3">
                    <div class=" row justify-content-center align-self-center col-md-12">
                        <h2 style="text-align: center;">Tentang Kami</h2>
                        <div class="col-md-6">
                            <p style="text-align: justify;text-indent: 50px;">
                                Selain menjadi nama produk kopi, ‘Pesantren Kopi’ merupakan sebutan yang disematkan
                                masyarakat
                                kepada Pondok Pesantren At-Tanwir di Desa Slateng, Kecamatan Ledokombo, Kabupaten Jember,
                                Jawa
                                Timur. Sebutan itu bukan tanpa alasan, kopi memang menjadi ruh pendidikan di pondok yag
                                tepat
                                berada di bawah Gunung Raung ini.
                            </p>
                            <p style="text-align: justify;text-indent: 50px;">
                                Sebab, melalui kopi-lah pengasuh pondok, K.H Zainul Wasik mengelola dan mengasuh santrinya.
                                Selain dibebaskan dari biaya pendidikan dan diberi bekal ilmu agama, para santri juga
                                diedukasi
                                untuk mengolah kopi sejak fase pembibitan. Tujuannya, tak lain agar para santri kelak dapat
                                mengelola sendiri potensi kopi Raung yang melimpah di Desa Slateng.
                            </p>
                            <p style="text-align: justify;text-indent: 50px;">
                                Pesantren Kopi diolah dari biji kopi Raung pilihan dan memiliki 3 varian, yakni premium
                                robusta, medium robusta, dan lanang. Setiap bijinya bukan sekadar mengandung cita rasa
                                terbaik,
                                namun juga cerita bagaimana kami, Imaji Sociopreneur dan Pondok Pesantren At-Tanwir
                                mengatasi
                                tantangan ekonomi, sosial, dan pendidikan di Desa Slateng.
                            </p>
                            <p style="text-align: justify;text-indent: 50px;">Bermula sejak 2010, 11 tahun sudah kami hadir
                                di tengah masyarakat untuk bersama-sama
                                mengatasi tantangan ekonomi, sosial, dan pendidikan di Desa Slateng. Kami percaya kolaborasi
                                adalah kunci untuk mengatasi setiap tantangan.
                            </p>
                            <p style="text-align: justify;text-indent: 50px;">
                                Maka, mari bergerak bersama kami, rasakan cerita di setiap tegukan Pesantren Kopi.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
            var counter = 1; //instantiate a counter
            var maxImage = 4; //the total number of images that are available
            setInterval(function () {
                document.querySelector('header').style.backgroundImage = "url('user/images/kopi_" + (counter + 1) +
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
