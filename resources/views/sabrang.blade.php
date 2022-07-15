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
                <header id="image-6" class="d-flex h-100">
                    <div class=" row justify-content-center align-self-center col-md-12" style="z-index: 3;">
                        <h1 style="text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">
                            Swajaya Karya
                        </h1>
                        <p style="text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;" class="col-md-8">
                            Swajaya Karya adalah pengrajin genteng berkualitas yang diproduksi di Desa Sabrang, Kecamatan Ambulu, salah satu sentra produksi genteng di Kabupaten Jember, Jawa Timur.
                        </p>
                    </div>
                    <div class=layer></div>
                </header>
            </section>
            <section>
                <div id="" class="d-flex h-100 bg-g-2">
                    <div class=" row justify-content-center align-self-center col-md-12">
                        <h2 style="text-align: center;">Tentang Kami</h2>
                        <div class="col-md-6">
                            <p style="text-align: justify;text-indent: 50px;">
                                Di samping rumah Irawan, warga Desa Sabrang, Kecamatan Ambulu, Jember terhampar halaman cukup luas. Pada hari terik, genteng-genteng berjajar untuk dijemur. Di salah satu bagian, juga terdapat ruang khusus untuk pembakaran dan percetakan genteng. Irawan telah bergelut di industri gerabah sejak lebih dari 25 tahun lalu. Semangat dan ketekunannya mengantarkan kami bertemu dan berkolaborasi untuk lebih meluaskan cakupan pasar produk gentengnya.
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
            var maxImage = 3; //the total number of images that are available
            setInterval(function () {
                document.querySelector('header').style.backgroundImage = "url('user/images/sabrang_" + (counter + 1) +
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
