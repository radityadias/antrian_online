<x-app-layout>
    <div class="bg-white rounded-md w-full max-h-1/2 p-5 overflow-auto">
        <div class="border-b border-secondary-gray pb-2">
            <p class="text-3xl font-medium">Antrian Diproses</p>
        </div>
        <x-antrian_table :list_antrian="$log_antrian" button_action="Selesai"/>
    </div>
</x-app-layout>