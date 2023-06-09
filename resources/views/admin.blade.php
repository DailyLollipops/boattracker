<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Admin</title>
</head>
<body>
    <x-navbar/>
    <div class="grid grid-cols-3 gap-4 mt-8 px-4 justify-center md:px-10">
        <x-blockbox/>
    </div>

    <button id="boat-fab" title="Register Boat" class="fixed z-90 bottom-10 right-8 bg-[#425B71] w-[72px] h-[72px] overflow-clip rounded-full drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-[#346A90] hover:drop-shadow-2xl">
        <img src="{{ asset('/images/boat.svg') }}" alt="Register Boat" class="h-9 w-9 translate-x-[18px]">
        <svg width="68" height="44" viewBox="0 0 68 44" fill="none" xmlns="http://www.w3.org/2000/svg" class="scale-150 translate-x-1 translate-y-3">
            <path d="M80 7.22399V49C80 52.866 77.3303 56 74.0371 56H0C3.63886 24.3779 26.7231 0 54.6576 0C63.7941 0 72.4118 2.60782 80 7.22399Z" fill="#797979" fill-opacity="0.34"/>
        </svg>
    </button>

    <x-modal.register :owners="$owners"/>
</body>
</html>