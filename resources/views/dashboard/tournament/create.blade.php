@extends('layouts.dashboard')
@section('title', 'Tambah tournamen')
@section('style')
    <style>
        .ck-content {
            height: 530px
        }
    </style>
@endsection
@section('content')
    <main class="w-full flex-grow p-6">
        <div class="flex items-center justify-between mb-6">
            <!-- Left side - Title -->
            <h1 class="text-3xl text-black">@yield('title')</h1>

            <!-- Right side - Tambah Data button -->
            <a href="{{ route('tournament.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md text-sm">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>


        <div class="w-full mt-6">
            <div class="bg-white overflow-auto">
                <form class="p-10 bg-white rounded shadow-xl" method="POST" action="{{ route('tournament.store') }}">
                    @csrf
                    <div class="flex">

                        <div class="lg:w-2/3 pr-4">

                            <div class="">
                                <label class="block text-sm text-gray-600" for="title">Turnamen</label>
                                <input
                                    class="w-full px-3 py-2 text-gray-700 border border-gray-200 rounded @error('title') border border-red-500 @enderror"
                                    id="title" name="title" type="text" value="{{ old('title') }}"
                                    aria-label="Nama">
                                @error('title')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Schedule Date and End Register Date (in Two Columns) -->
                            <div class="mt-2 flex">
                                <!-- Schedule Date -->
                                <div class="w-1/2 pr-2">
                                    <label for="schedule_date" class="block text-sm text-gray-600">Tanggal Turnamen</label>
                                    <input type="date" id="schedule_date" name="schedule_date"
                                        class="w-full px-5 py-2 text-gray-700 border border-gray-200 rounded datepicker @error('schedule_date') border border-red-500 @enderror"
                                        value="{{ old('schedule_date') }}" placeholder="Schedule Date"
                                        aria-label="Schedule Date">
                                    @error('schedule_date')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- End Register Date -->
                                <div class="w-1/2 pl-2">
                                    <label for="end_register_date" class="block text-sm text-gray-600">Tanggal Tutup
                                        Pendaftaran</label>
                                    <input type="date" id="end_register_date" name="end_register_date"
                                        class="w-full px-5 py-2 text-gray-700 border border-gray-200 rounded datepicker @error('end_register_date') border border-red-500 @enderror"
                                        value="{{ old('end_register_date') }}" placeholder="End Register Date"
                                        aria-label="End Register Date">
                                    @error('end_register_date')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-2">
                                <label class="block text-sm text-gray-600" for="description">Deskripsi</label>
                                <textarea name="description" id="editor" class="editor" cols="30" rows="10"></textarea>
                                @error('description')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="lg:w-1/3 pl-4">

                            <div class="">
                                <label for="type" class="block text-sm text-gray-600">Tipe</label>
                                <select id="type" name="type" required
                                    class="w-full px-3 py-2.5 text-gray-700 border border-gray-200 rounded @error('type') border border-red-500 @enderror">
                                    <option value="{{ \App\Models\Tournament::TYPE_FREE }}">Free</option>
                                    <option value="{{ \App\Models\Tournament::TYPE_PREMIUM }}">Premium</option>
                                </select>
                                @error('type')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mt-2" id="price" style="display: none">
                                <label for="price" class="block text-sm text-gray-600">Harga </label>
                                <input type="text" id="price" name="price"
                                    class="rupiah w-full px-5 py-2 text-gray-700 border border-gray-200 rounded @error('price') border border-red-500 @enderror"
                                    value="{{ old('price') }}" placeholder="Harga" aria-label="price">
                                @error('price')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mt-2">
                                <label for="slot" class="block text-sm text-gray-600">Slot </label>
                                <input type="number" id="slot" name="slot" required
                                    class="w-full px-5 py-2 text-gray-700 border border-gray-200 rounded @error('slot') border border-red-500 @enderror"
                                    value="{{ old('slot') }}" placeholder="Available Slots" aria-label="Slot">
                                @error('slot')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mt-2">

                                <label for="type" class="block text-sm text-gray-600">Mode</label>
                                <select id="type" name="type" required
                                    class="w-full px-3 py-2.5 text-gray-700 border border-gray-200 rounded @error('type') border border-red-500 @enderror">
                                    <option value="{{ \App\Models\Tournament::MODE_SINGLE }}">Single</option>
                                    <option value="{{ \App\Models\Tournament::MODE_DOUBLE }}">Double</option>
                                    <option value="{{ \App\Models\Tournament::MODE_GROUP }}">Goup</option>
                                </select>
                                @error('type')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <span>Thumbnails</span>
                                <div
                                    class="relative h-40 rounded-lg border-dashed border-2 border-gray-200 bg-white flex justify-center items-center hover:cursor-pointer">
                                    <div class="absolute">
                                        <div class="flex flex-col items-center ">
                                            <i class="fa fa-upload fa-3x text-gray-200"></i>
                                            <span class="block text-gray-400 font-normal">Drag and Drop</span>
                                            <span class="block text-gray-400 font-normal">or</span>

                                            <span class="block text-blue-400 font-normal">Browse files</span>

                                        </div>
                                    </div> <input type="file" id="input-img" class="input-img h-full w-full opacity-0"
                                        name="thumbnails">
                                </div>
                                <div class="flex justify-between items-center text-gray-400">
                                    <span>Accepted file type:jpg,png,jpeg</span>
                                    <span class="flex items-center ">
                                </div>
                                @error('thumbnail')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mt-2">
                                <img width="100%" id="input-img" class="object-cover rounded-md img-preview"
                                    src="/backoffice/img/no-image.jpg" alt="Thumbnail Preview">
                            </div>

                        </div>

                    </div>


                    <div class="mt-6">
                        <button class="px-4 py-2 text-white font-light tracking-wider bg-gray-900 rounded"
                            type="submit">Submit</button>
                    </div>
                </form>

            </div>
        </div>

    </main>

@endsection
@section('script')

    <script src="/backoffice/js/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            // Fungsi yang dipanggil ketika nilai tipe berubah
            $('#type').on('change', function() {
                var selectedType = $(this).val();

                // Jika tipe yang dipilih adalah Premium, tampilkan elemen harga
                if (selectedType === '{{ \App\Models\Tournament::TYPE_PREMIUM }}') {
                    $('#price').show();
                } else {
                    // Jika tipe yang dipilih bukan Premium, sembunyikan elemen harga
                    $('#price').hide();
                }
            });
        });
        $('#input-img').change(function() {
            const file = this.files[0];
            if (file && file.name.match(/\.(jpg|jpeg|png)$/)) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $('.img-preview').attr('src', event.target.result)
                }
                reader.readAsDataURL(file);
            } else {
                alert('please upload image file');
            }
        });


        $('.rupiah').on('keyup', function(e) {
            $(this).val(formatRupiah($(this).val(), "Rp"));

        })
        $(".number").on("keypress keyup blur", function(event) {
            $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
        $('.remove-space').on('keypress keyup blur', function(event) {
            $(this).val($(this).val().replace(/\s+/g, ''));
        })

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp " + rupiah : "";
        }

        function IDRToNum(value) {
            return value.replace(/\D/g, '');
        }
        ClassicEditor.create(document.querySelector('.editor'), {

                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'bold', 'italic', 'bulletedList', 'numberedList', 'link',
                        '|',
                        'blockQuote',
                        'insertTable',
                        '|',
                        'code',
                        'codeBlock',
                        'htmlEmbed'
                    ]
                },
                language: 'id',
                licenseKey: '',
            })
            .then(editor => {
                window.editor = editor;




            })
            .catch(error => {
                console.error('Oops, something went wrong!');
                console.error(
                    'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:'
                );
                console.warn('Build id: hosofu6grpb-m75gatu85ah8');
                console.error(error);
            });
    </script>
@endsection
