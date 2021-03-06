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
                <header id="image-3" class="d-flex h-100">
                    <div class=" row justify-content-center align-self-center col-md-12" style="z-index: 3;">
                        <h1 style="text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">
                            Bag-On Craft
                        </h1>
                        <p style="text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;" class="col-md-8">
                            Melalui keterampilan dan kerajinan tangan kelompok
                            perempuan sehingga mampu menwujudkan produk
                            yang mampu bernilai jual. Tas rajut, sepatu rajut, maupun pengharum kopi yang dihasilkan Bag On Craft tak hanya berkualitas, di sana turut mengandung semangat untuk berdaya dan memberdayakan perempuan di sekitar Desa Bagon, Kec. Puger, Kabupaten Jember. Produk rajut Bag On Craft merefleksikan kebutuhan sehari-hari (daily product) maupun sebagai alternatif fashion pemakainya.
                        </p>
                    </div>
                    <div class=layer></div>
                </header>
            </section>
            <section>
                <div id="" class="d-flex h-100 bg-b-2" style="text-align: center;">
                    <div class=" row justify-content-center align-self-center col-md-12">
                        <h2>Produk Kita</h2>
                        <div class="row col-md-12 col-sm-12" style="justify-content: center;">
                            <div class="col-md-4 col-m-4 shape">
                                <img src="{{asset('user/images/bagon_5.jpg')}}" alt="" srcset="">
                                <br>
                                <p>Tas Pesta Kilauan Matahari</p>
                            </div>
                            <div class="col-md-4 col-m-4 shape">
                                <img src="{{asset('user/images/bagon_7.jpg')}}" alt="" srcset="">
                                <br>
                                <p>Pengharum Aroma Kopi Raung</p>
                            </div>
                            <div class="col-md-4 col-m-4 shape">
                                <img src="{{asset('user/images/bagon_6.jpg')}}" alt="" srcset="">
                                <br>
                                <p>Tas Pesta Glamour Zamrud</p>
                            </div>
                            <div class="col-md-4 col-m-4 shape">
                                <img src="{{asset('user/images/bagon_8.jpg')}}" alt="" srcset="">
                                <br>
                                <p>Sepatu Gemerlap Senja</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div id="" class="d-flex h-100 bg-b-3">
                    <div class=" row justify-content-center align-self-center col-md-12">
                        <h2 style="text-align: center;">Tentang Kami</h2>
                        <div class="col-md-6">
                            <p style="text-align: justify;text-indent: 50px;">
                                Berawal dari hobi, kini Saidah, perajut asal Desa Bagon, Kec. Puger, Kabupaten Jember, berhasil menularkan keterampilan merajutnya kepada perempuan di sekitar desanya melalui kelompok Bag On Craft. Produk rajutnya pun kian variatif: daily bag rajut, sepatu rajut, hingga pengharum kopi unik yang dapat digunakan untuk ruangan hingga mobil. Selain desain unik dan berkualitas, di setiap rajutannya tercermin pula semangat berdaya dan memberdayakan orang lain. Mengusung semangat yang sama, Imaji Sociopreneur berkolaborasi dengan Bag On Craft berkomitmen untuk lebih mengenalkan produk-produk Bag On Craft kepada masyarakat.
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
                document.querySelector('header').style.backgroundImage = "url('user/images/bagon_" + (counter + 1) +
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
