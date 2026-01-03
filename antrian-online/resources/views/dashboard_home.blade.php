<x-app-layout>

    <div class="w-full bg-white rounded-md p-5">
        <div class="border-b border-secondary-gray pb-2">
            <p class="text-3xl font-medium">Antrian</p>
        </div>
        <div class="grid grid-cols-3 gap-3">
            <div class="w-full bg-purple-500 text-center text-white rounded-md py-3 space-y-5">
                <p class="text-xl">Menunggu</p>
                <p class="text-4xl font-bold">
                    @if ($total_antrian_menunggu)
                    {{ $total_antrian_menunggu }}
                    @else
                        0
                    @endif
                </p>
            </div>
            <div class="w-full bg-blue-500 text-center text-white rounded-md py-3 space-y-5">
                <p class="text-xl">Selesai</p>
                <p class="text-4xl font-bold">
                    @if ($total_antrian_selesai)
                    {{ $total_antrian_selesai }}
                    @else
                        0
                    @endif
                </p>
            </div>
            <div class="w-full bg-gray-500 text-center text-white rounded-md py-3 space-y-5">
                <p class="text-xl">Total</p>
                <p class="text-4xl font-bold">
                    @if ($total_antrian)
                    {{ $total_antrian }}
                    @else
                        0
                    @endif
                </p>
            </div>
            
        </div>
    </div>

    <div class="w-full bg-white rounded-md p-5 mt-5">
        <div class="grid grid-cols-4 gap-3">
            <div class="col-span-4 text-center">
                <p class="text-md">Antrian Aktif</p>
            </div>
            <div class="col-span-4 text-center mb-5">
                <p class="text-6xl font-semibold">
                    @if ($antrian_menunggu)
                        {{ $antrian_menunggu->nomor }}
                    @else
                        A000
                    @endif
                </p>
            </div>
            <div class="col-start-2 col-end-3">
                @if ($antrian_menunggu)
                    <form action="{{ route('panggil', $antrian_menunggu->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full p-5 bg-green-500 font-bold rounded-md text-white">Panggil Selanjutnya</button>
                    </form>
                @else 
                    <button class="w-full p-5 bg-green-500 font-bold rounded-md text-white disabled:bg-green-800">Panggil Selanjutnya</button>
                @endif
            </div>
            <div class="col-start-3 col-end-4">
                <button disabled class="w-full p-5 bg-complementary-accent font-bold rounded-md text-white ">Panggil Ulang</button>
            </div>
        </div>
    </div>

</x-app-layout>