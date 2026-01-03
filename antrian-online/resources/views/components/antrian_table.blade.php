@props(['list_antrian', 'button_action'])

<div class="px-2 py-3">
    <table class="w-full">
        <thead class="border-b border-primary-base">
            <tr>
                <th class="py-2">No</th>
                <th>Antrian</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($list_antrian as $antrian)
                <tr class="odd:bg-secondary-gray/70 even:bg-white">
                    <th class="px-2 py-4">{{ $antrian->id }}</th>
                    <td>{{ $antrian->nomor }}</td>
                    <td>{{ $antrian->status }}</td>
                    <td>
                        <form action="{{ route('antri_selesai', $antrian->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="p-2 bg-green-600 rounded-md text-sm font-medium text-white">{{ $button_action }}</button>
                        </form>
                        @if (!$antrian->status == 'diproses')
                            <button class="p-2 bg-amber-500 rounded-md text-sm font-meidum text-white cursor-pointer">Panggil Ulang</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
