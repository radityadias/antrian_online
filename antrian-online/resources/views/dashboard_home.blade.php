<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/app.css') }}">
</head>

<body>
    <x-sidebar />

    <section id="tabel-antrian" class="p-4 md:ml-64">
        <div class="bg-white rounded-md w-full p-3">
            <div class="w-full border-b border-secondary-gray px-2 pb-1">
                <h2 class="text-3xl font-semibold">Antrian Menunggu</h2>
            </div>

            <div class="flex justify-center items-center gap-2 pt-5">
                <div class="w-1/4 h-36 rounded-md bg-blue-500 text-white py-4">
                    <p class="text-xl text-center font-medium">Antrian Aktif</p>
                    <div class="w-full h-full flex justify-center items-center">
                        @if ($antrian_aktif)
                            <p class="text-5xl">{{ $antrian_aktif->nomor}}</p>
                        @else
                            <p class="text-5xl">A000</p>
                        @endif
                    </div>
                </div>
                <div class="w-1/4 h-36 rounded-md bg-gray-500 text-white py-4">
                    <p class="text-xl text-center font-medium">Total Antrian</p>
                    <div class="w-full h-full flex justify-center items-center">
                        @if (!$total_antrian)
                            <p class="text-5xl">0</p>
                        @else
                            <p class="text-5xl">{{ $total_antrian }}</p>
                        @endif
                    </div>
                </div>
            </div>

            @if ($antrian_aktif)
                <div class="flex justify-center items-center py-4 gap-4">
                    <form action="{{ route('panggil', $antrian_aktif->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="p-2 bg-green-600 text-white rounded-md">Panggil berikutnya</button>
                    </form>
                    <a href="#" class="p-2 bg-complementary-accent text-white rounded-md">Panggil Ulang</a>
                </div>
            @endif

            @error('message')
                <div class="text-red">{{ $message }}</div>
            @enderror
        </div>
    </section>

</body>

</html>
