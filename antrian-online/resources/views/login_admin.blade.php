<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    @vite(entrypoints: 'resources/css/app.css')
</head>
<body>
    <main>
        <div class="w-full h-screen flex justify-center items-center">
            <div class="w-3/4 md:w-1/2 h-fit bg-primary-accent rounded-xl p-2">
                <div class="w-full h-fit border-b border-secondary-white pb-2">
                    <p class="text-xl text-center text-secondary-white">Login Admin</p>
                </div> 
                <div class="w-full h-fit px-5 md:px-10 py-5">
                    <form action="{{ route('login') }}" method="POST" class="space-y-5 flex flex-col">
                        @csrf
                        <div>
                            <label for="nama" class="text-white mb-2">Username</label>
                            <input type="text" id="nama" name="nama" class="w-full rounded-md p-1 border bg-secondary-blue/50 border-secondary-white/50 text-white placeholder:text-white">
                        </div>
                        <div>
                            <label for="password" class="text-white mb-2">Password</label>
                            <input type="password" id="password" name="password" class="w-full rounded-md p-1 border bg-secondary-blue/50 border-secondary-white/50 text-white placeholder:text-white">
                        </div>
                        <button type="submit" class="w-1/2 mx-auto text-primary-base bg-complementary-accent rounded-md p-2 text-lg font-semibold">Login</button>
                        @error('message')
                            <div class="text-center text-red-500">{{ $message }}</div>
                        @enderror
                    </form>
                </div>
            </div>
        </div>
    </main>
    
</body>
</html>