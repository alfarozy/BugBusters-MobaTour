@extends('layouts.homepage')
@section('title', 'Beranda - Moba Tourney')
@section('content')
    <!-- /TOP -->
    <section id="about" class="uk-section uk-section-default">
        <div class="uk-container">
            <div class="uk-grid uk-child-width-1-2@l uk-flex-middle" data-uk-grid
                data-uk-scrollspy="target: > div; cls: uk-animation-slide-left-medium">
                <div class="uk-grid-small 
            uk-text-center">
                    <img src="/image/about.svg" width="400px" alt="">
                </div>
                <div data-uk-scrollspy-class="uk-animation-slide-right-medium">
                    <h2 class="uk-margin-small-top">Tentang kami</h2>
                    <p class="subtitle-text">
                        Moba Tourney merupakan platform pendaftaran turnamen online terpercaya pertama di indonesia,
                        kami menyediakan informasi lengkap mengenai jadwal turnamen Mobile Legends.
                        <br>
                        <br>
                        Kami berkomitmen untuk menjadi pelopor dalam memberikan pengalaman turnamen yang menyenangkan
                        dan menciptakan panggung tempat setiap pemain dapat membuktikan kemampuannya.
                    </p>
                    <a class="uk-button uk-button-primary" href="#"> Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </section>

    <!-- TURNAMEN -->
    <section class="uk-section uk-section-default">

        <div class="uk-container uk-container-xsmall uk-text-center uk-section uk-padding-remove-top">
            <h2 class="uk-margin-remove uk-h1">Turnamen</h2>
        </div>
        <div class="uk-container uk-padding">
            <div class="uk-child-width-1-3@m uk-grid-match" uk-grid>
                <div>
                    <div class="uk-card uk-card-default">
                        <div class="uk-card-media-top">
                            <img src="https://source.unsplash.com/random/900x700/?fruit" alt="">
                        </div>
                        <div class="uk-card-body">
                            <h3 class="uk-card-title">Judul Trunamen</h3>
                            <div class="uk-flex uk-flex-between uk-width-1-1">
                                <p class="uk-text-left uk-margin-remove uk-text-primary">Gratis</p>
                                <p class="uk-text-right uk-margin-remove">Slot: 50/60</p>
                            </div>
                            <div class="uk-alert-primary" uk-alert>
                                <p>24 Desember 2023 Jam 20:30 WIB</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-default">
                        <div class="uk-card-media-top">
                            <img src="https://source.unsplash.com/random/900x700/?fruit" alt="">
                        </div>
                        <div class="uk-card-body">
                            <h3 class="uk-card-title">Judul Trunamen</h3>
                            <div class="uk-flex uk-flex-between uk-width-1-1">
                                <p class="uk-text-left uk-margin-remove uk-text-primary">Gratis</p>
                                <p class="uk-text-right uk-margin-remove">Slot: 50/60</p>
                            </div>
                            <hr>
                            <div class="uk-alert-primary" uk-alert>
                                <p>24 Desember 2023 Jam 20:30 WIB</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-default">
                        <div class="uk-card-media-top">
                            <img src="https://source.unsplash.com/random/900x700/?fruit" alt="">
                        </div>
                        <div class="uk-card-body">
                            <h3 class="uk-card-title">Judul Trunamen</h3>
                            <div class="uk-flex uk-flex-between uk-width-1-1">
                                <p class="uk-text-left uk-margin-remove uk-text-primary">Gratis</p>
                                <p class="uk-text-right uk-margin-remove">Slot: 50/60</p>
                            </div>
                            <div class="uk-alert-primary" uk-alert>
                                <p>24 Desember 2023 Jam 20:30 WIB</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add more grid items as needed -->
            </div>
        </div>
    </section>
    <!-- TURNAMEN -->
    <!-- BOTTOM -->
    <section class="uk-section uk-section-default">

        <div class="uk-container uk-container-xsmall uk-text-center uk-section uk-padding-remove-top">
            <h2 class="uk-margin-remove uk-h1">Keuntungan</h2>
        </div>
        <div class="uk-container">
            <div class="uk-grid uk-grid-large uk-child-width-1-3@m" data-uk-grid
                data-uk-scrollspy="target: > div; delay: 160; cls: uk-animation-slide-bottom-medium">
                <div class="uk-text-center">
                    <img src="/image/pendaftaran.svg" style="width: 150px;" alt="Image">
                    <h4 class="uk-margin-small-bottom uk-margin-top uk-margin-remove-adjacent">Registrasi Mudah dan
                        Cepat</h4>
                    <p>Kami telah menyederhanakan proses registrasi untuk memastikan bahwa Anda dapat fokus pada
                        persiapan strategi dan pertarungan Anda.</p>
                </div>
                <div class="uk-text-center">
                    <img src="/image/jadwal.svg" style="width: 150px;" alt="Image">
                    <h4 class="uk-margin-small-bottom uk-margin-top uk-margin-remove-adjacent">Jadwal Turnamen
                        Fleksibel
                    </h4>
                    <p>Bersama MOBA Tourney, Anda dapat mengakses jadwal turnamen yang fleksibel sesuai dengan waktu
                        luang Anda.</p>
                </div>
                <div class="uk-text-center">
                    <img src="/image/gift.svg" style="width: 110px;" alt="Image">
                    <h4 class="uk-margin-small-bottom uk-margin-top uk-margin-remove-adjacent">Hadiah Menarik </h4>
                    <p>Bersama MOBA Tourney, Anda dapat mengakses jadwal turnamen yang fleksibel sesuai dengan waktu
                        luang Anda.</p>
                </div>

            </div>
        </div>
    </section>
@endsection
