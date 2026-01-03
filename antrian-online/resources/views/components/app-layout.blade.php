<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-sidebar/>

    <section id="content" class="p-4 md:ml-64">
        {{ $slot }}
    </section>
</body>
</html>