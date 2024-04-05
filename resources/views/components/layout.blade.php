<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Provinha João Matos & João Siqueira</title>
</head>
<body>
    
    @include('components.header')
    <main class="px-4 lg:px-24 my-12">
        {{ $slot }}
    </main>
</body>
</html>