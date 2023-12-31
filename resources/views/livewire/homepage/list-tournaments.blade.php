<main>
    <br>
    <div class="mb-2 px-5 flex justify-between items-center">
        <div>
            <div class=" pt-5 flex justify-end items-center space-x-2">
                <select id="filter" wire:model="filter" wire:change="selectFilter"
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="all">Semua turnamen</option>
                    <option value="latest">Terbaru</option>
                    <option value="oldest">Terlama</option>
                    <option value="free">Gratis</option>
                    <option value="premium">Berbayar</option>
                </select>
            </div>
        </div>
        <div>
            <div class="">
                <input type="search" wire:model="search" wire:keydown="searchTournaments" id="search"
                    placeholder="Cari turnamen"
                    class="w-full px-5 py-3 text-base transition bg-transparent border rounded-md outline-none border-stroke dark:border-dark-3 text-body-color dark:text-dark-6 placeholder:text-dark-6 focus:border-primary dark:focus:border-primary focus-visible:shadow-none">
            </div>
        </div>
    </div>
    <section class="pb-10 lg:pb-20 dark:bg-dark">

        <div class="container flex flex-wrap p-5">
            <!-- List Tournament Section (Kiri) -->
            <div class="w-full px-5 mt-3">
                <div class="-mx-4 flex flex-wrap" id="tournament-container">
                    @forelse ($turnaments as $item)
                        <div class="w-full px-4 md:w-1/2 lg:w-1/3 ">
                            <div class="wow fadeInUp group mb-10 shadow rounded" data-wow-delay=".1s">
                                <div class="overflow-hidden rounded-[5px]">
                                    <a href="{{ route('home.tournaments.show', $item->slug) }}" class="block">
                                        <img src="{{ $item->getThumbnails() }}" alt="image"
                                            class="w-full transition group-hover:scale-125" />
                                    </a>
                                </div>
                                <div class="p-4">
                                    <div class="flex justify-between mb-2">
                                        <div class="flex-1">
                                            <p class="max-w-[370px] text-base text-body-color dark:text-dark-6">
                                                Slot {{ $item->userTournaments->count() }}/{{ $item->slot }}
                                            </p>
                                        </div>
                                        <div class="">
                                            @if ($item->type == 'free')
                                                <b class="text-secondary ">
                                                    Pendaftaran Gratis
                                                </b>
                                            @else
                                                <b class="text-primary ">
                                                    {{ currencyIDR($item->price) }} / Team
                                                </b>
                                            @endif
                                        </div>
                                    </div>
                                    <h3>
                                        <a href="{{ route('home.tournaments.show', $item->slug) }}"
                                            class="mb-4 inline-block text-xl font-semibold text-dark hover:text-primary dark:hover:text-primary sm:text-2xl lg:text-xl xl:text-2xl">
                                            {{ $item->title }}
                                        </a>
                                    </h3>

                                    <div class="mt-3 flex justify-between">

                                        <div>
                                            <small style="display: block">Pendaftaran Dibuka</small>
                                            @php
                                                $end_register_date = Carbon\Carbon::parse($item->end_register_date);
                                            @endphp
                                            <small
                                                class="text-body-color mb-3">{{ $end_register_date->translatedFormat('D') }},{{ $end_register_date->translatedFormat('d M Y H:i') }}
                                                WIB</small>

                                        </div>
                                        <div style="text-align: end">
                                            <small style="display: block">Turnamen Dimulai</small>
                                            @php
                                                $schedule_date = Carbon\Carbon::parse($item->schedule_date);
                                            @endphp
                                            <small
                                                class="text-body-color mb-3">{{ $schedule_date->translatedFormat('D') }},{{ $schedule_date->translatedFormat('d M Y H:i') }}
                                                WIB</small>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="w-full px-4 text-center flex justify-center items-center">
                            <img src="/image/data-not-found.svg" alt="" srcset="">
                        </div>
                    @endforelse

                </div>
                <!-- Paginasi -->
                <div class="mt-8 text-center wow fadeInUp" data-wow-delay=".2s">
                    {{ $turnaments->links() }}
                </div>
            </div>

        </div>
    </section>

</main>
