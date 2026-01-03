<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antrian</title>
    @vite(entrypoints: 'resources/css/app.css')
</head>
<body>
    <main>
        <div class="w-full h-screen flex flex-col justify-center items-center gap-20">
            <div>
                <p class="text-3xl font-medium mb-5">Antrian saat ini:</p> 
                @if ($antrian)
                    <p class="text-4xl font-semibold text-center">{{ $antrian->nomor }}</p>
                @else
                    <p class="text-4xl font-semibold text-center">A000</p>
                @endif  
            </div>
            
            <a href="{{ 'user/antri' }}" class="w-1/2 h-1/2 bg-blue-600 flex items-center justify-center rounded-lg">
                <p class="text-5xl font-bold text-white">Cetak Antrian</p>
            </a>
        </div>
    </main>
</body>
</html>