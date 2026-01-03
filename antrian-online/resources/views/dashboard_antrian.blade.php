<x-app-layout>
    <div class="bg-white rounded-md w-full max-h-1/2 p-3 overflow-auto">
        <x-antrian_table :list_antrian="$antrian_diproses" button_action="Selesai"/>
    </div>
</x-app-layout>