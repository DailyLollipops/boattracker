<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
    @vite('resources/css/app.css')
    <title>{{$title}}</title>
</head>
<body>
    <div class="flex flex-row w-full h-screen">
        <x-sidebar/>
        <div class="flex flex-col w-full h-screen overflow-y-scroll">
            <div class="flex flex-row pl-6 pr-12 py-4 justify-between">
                <button id="menu" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48" class="fill-gray-800 h-6 w-6">
                        <title>Menu</title>
                        <path d="M120-240v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z"/>
                    </svg>
                </button>
                <a href="/logout">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48" class="fill-gray-800 h-6 w-6">
                        <title>Logout</title>
                        <path d="M180-120q-24 0-42-18t-18-42v-600q0-24 18-42t42-18h291v60H180v600h291v60H180Zm486-185-43-43 102-102H375v-60h348L621-612l43-43 176 176-174 174Z"/>
                    </svg>
                </a>
            </div>
            <div class="flex flex-row p-6 bg-[#F9F9FB]">
                <p class="font-sans font-normal text-gray-700 text-lg whitespace-pre">Admin  /  <span class="font-bold">{{$title}}</span></p>
            </div>
            <div class="flex flex-col px-6 flex-1">
                @yield('content')
            </div>
        </div>
    </div>

    {{-- Register Boat FAB --}}
    <button id="boat-fab" title="Register Boat" class="fixed z-90 bottom-8 right-9 bg-[#425B71] w-[72px] h-[72px] overflow-clip rounded-full drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-[#346A90] hover:drop-shadow-2xl">
        <img src="{{ asset('/images/boat.svg') }}" alt="Register Boat" class="h-9 w-9 translate-x-[18px]">
        <svg width="68" height="44" viewBox="0 0 68 44" fill="none" xmlns="http://www.w3.org/2000/svg" class="scale-150 translate-x-1 translate-y-3">
            <path d="M80 7.22399V49C80 52.866 77.3303 56 74.0371 56H0C3.63886 24.3779 26.7231 0 54.6576 0C63.7941 0 72.4118 2.60782 80 7.22399Z" fill="#797979" fill-opacity="0.34"/>
        </svg>
    </button>

    {{-- Register Tracker FAB --}}
    <button id="tracker-fab" title="Register Tracker" class="fixed z-90 bottom-32 right-9 bg-[#346A90] w-[72px] h-[72px] overflow-clip rounded-full drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-[#425B71] hover:drop-shadow-2xl">
        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48" class="fill-[#D9D9D9] translate-x-[21px] scale-125">
            <path d="M732-644v-128H604v-60h128v-128h60v128h128v60H792v128h-60ZM480.089-490Q509-490 529.5-510.589q20.5-20.588 20.5-49.5Q550-589 529.411-609.5q-20.588-20.5-49.5-20.5Q451-630 430.5-609.411q-20.5 20.588-20.5 49.5Q410-531 430.589-510.5q20.588 20.5 49.5 20.5ZM480-80Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q24 0 47 3.25t46 9.75v125h129v128h93q2 16 3.5 31t1.5 31q0 100-79.5 217.5T480-80Z"/>
        </svg>
        <svg width="68" height="44" viewBox="0 0 68 44" fill="none" xmlns="http://www.w3.org/2000/svg" class="scale-150 translate-x-1 translate-y-3">
            <path d="M80 7.22399V49C80 52.866 77.3303 56 74.0371 56H0C3.63886 24.3779 26.7231 0 54.6576 0C63.7941 0 72.4118 2.60782 80 7.22399Z" fill="#FFFFFF" fill-opacity="0.34"/>
        </svg>
    </button>

    {{-- Register Account FAB --}}
    <button id="account-fab" title="Register Account" class="fixed z-90 bottom-56 right-9 bg-white border border-[#425B71] w-[72px] h-[72px] overflow-clip rounded-full drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-[#346A90] hover:drop-shadow-2xl">
        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48" class="translate-x-[23px]">
            <path d="M38-160v-94q0-35 18-63.5t50-42.5q73-32 131.5-46T358-420q62 0 120 14t131 46q32 14 50.5 42.5T678-254v94H38Zm700 0v-94q0-63-32-103.5T622-423q69 8 130 23.5t99 35.5q33 19 52 47t19 63v94H738ZM358-481q-66 0-108-42t-42-108q0-66 42-108t108-42q66 0 108 42t42 108q0 66-42 108t-108 42Zm360-150q0 66-42 108t-108 42q-11 0-24.5-1.5T519-488q24-25 36.5-61.5T568-631q0-45-12.5-79.5T519-774q11-3 24.5-5t24.5-2q66 0 108 42t42 108ZM98-220h520v-34q0-16-9.5-31T585-306q-72-32-121-43t-106-11q-57 0-106.5 11T130-306q-14 6-23 21t-9 31v34Zm260-321q39 0 64.5-25.5T448-631q0-39-25.5-64.5T358-721q-39 0-64.5 25.5T268-631q0 39 25.5 64.5T358-541Zm0 321Zm0-411Z"/>
        </svg>
        <svg width="68" height="44" viewBox="0 0 68 44" fill="none" xmlns="http://www.w3.org/2000/svg" class="scale-150 translate-x-1 translate-y-3">
            <path d="M80 7.22399V49C80 52.866 77.3303 56 74.0371 56H0C3.63886 24.3779 26.7231 0 54.6576 0C63.7941 0 72.4118 2.60782 80 7.22399Z" fill="#425B71" fill-opacity="0.34"/>
        </svg>
    </button>

    <x-modal.register :owners="$owners" :boats="$boats"/>

    
    <script src="{{ asset('/js/menu.js') }}"></script>
</body>
</html>