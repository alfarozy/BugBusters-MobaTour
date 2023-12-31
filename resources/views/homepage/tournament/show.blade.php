@extends('layouts.homepage')
@section('title', 'Tournamen ' . $data->title)
@section('content')
    <section class="pb-10" style="margin-top: 70px">
        <div class="container">
            <div class="flex flex-wrap justify-center -mx-4">
                <div class="w-full px-4">
                    <div class="flex flex-wrap -mx-4">
                        <div class="w-full px-4 lg:w-8/12">
                            <div>
                                <h2 class="wow fadeInUp mb-8 text-2xl font-bold text-dark dark:text-white sm:text-3xl md:text-[35px] md:leading-[1.28]"
                                    data-wow-delay=".1s
                ">
                                    {{ $data->title }}
                                </h2>
                                <div class="content">
                                    @if ($data->type == 'free')
                                        <span
                                            class="mb-6 inline-block rounded-[5px] bg-secondary px-4 py-0.5 text-center text-xs font-medium leading-loose text-white">
                                            Pendaftaran gratis
                                        </span>
                                    @else
                                        <span
                                            class="mb-6 inline-block rounded-[5px] bg-primary px-4 py-0.5 text-center text-xs font-medium leading-loose text-white">
                                            {{ currencyIDR($data->price) }} / Team
                                        </span>
                                    @endif
                                    <div>

                                        <div class="mt-3 flex justify-between">

                                            <div>
                                                <b style="display: block">Tim yang terdaftar</b>

                                                <p class="text-body-color mb-3">
                                                    {{ $data->userTournaments->count() }}/{{ $data->slot }} </p>

                                            </div>
                                            <div style="text-align: end">
                                                <b style="display: block">Mode Turnamen</b>

                                                <p class="text-body-color mb-3">{{ str()->title($data->mode) }} Elemination
                                                </p>

                                            </div>

                                        </div>

                                        <div class="mt-3 flex justify-between">

                                            <div>
                                                <b style="display: block">Pendaftaran Ditutup</b>
                                                @php
                                                    $end_register_date = Carbon\Carbon::parse($data->end_register_date);
                                                @endphp
                                                <p class="text-body-color mb-3">
                                                    {{ $end_register_date->translatedFormat('D') }},{{ $end_register_date->translatedFormat('d M Y H:i') }}
                                                    WIB</p>

                                            </div>
                                            <div style="text-align: end">
                                                <div>
                                                    <b style="display: block">Turnamen Dimulai</b>
                                                    @php
                                                        $schedule_date = Carbon\Carbon::parse($data->schedule_date);
                                                    @endphp
                                                    <p class="text-body-color mb-3">
                                                        {{ $schedule_date->translatedFormat('D') }},{{ $schedule_date->translatedFormat('d M Y H:i') }}
                                                        WIB</p>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <br>
                                    {!! $data->description !!}
                                </div>
                            </div>
                        </div>
                        <div class="w-full px-4 lg:w-4/12">
                            <div class="wow fadeInUp mb-12 overflow-hidden rounded-[5px]" data-wow-delay=".1s">
                                <img src="{{ $data->getThumbnails() }}" alt="image" class="w-full" />
                            </div>
                            <div>
                                <div class="wow fadeInUp relative  border mb-12 overflow-hidden rounded-[5px] px-11 py-[60px] text-center lg:px-8"
                                    data-wow-delay=".1s
                ">
                                    <h3 class="mb-4 mb-[6px] text-[28px] font-semibold leading-[40px] text-dark">
                                        Registrasi turnamen
                                    </h3>
                                    <p class="mb-5 text-base text-body-color">
                                        Buruan daftarkan tim terbaik anda dan menangkan pertempuran.
                                    </p>
                                    <br>
                                    @if ($data->type == 'free')
                                        <div class="text-left bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3"
                                            role="alert">
                                            <p class="text-sm">Note: </p>
                                            <p class="font-bold">Registrasi gratis untuk setiap tim</p>
                                        </div>
                                    @else
                                        <div class="text-left bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3"
                                            role="alert">
                                            <p class="text-sm">Note:</p>
                                            <p class="font-bold">Biaya registrasi {{ currencyIDR($data->price) }} / Tim</p>
                                        </div>
                                    @endif

                                    <br>
                                    <br>
                                    @if (isExpired($data->end_register_date) == false)
                                        <a href="{{ route('tournament.registration', $data->slug) }}"
                                            class="p-4  h-[50px] w-full cursor-pointer rounded-md bg-primary text-center text-sm font-medium text-white transition duration-300 ease-in-out ">Registrasi
                                            sekarang </a>
                                    @endif

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
