<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Dashboard</title>
</head>
<body>
    <x-navbar/>
    <div class="flex flex-col space-y-8 mt-16 px-4 md:px-24 w-screen">
        <div class="w-3/4 flex flex-row justify-center md:justify-start">
            <select name="filter" id="filter" class="border border-gray-400 rounded-l-md px-5 py-3">
                <option value="name" class="font-sans font-normal text-lg">Boat Name</option>
                <option value="name" class="font-sans font-normal text-lg">Boat Id</option>
                <option value="name" class="font-sans font-normal text-lg">Boat License</option>
            </select>
            <div class="flex items-center relative w-1/2">
                <input name="search" id="search" class="w-full border border-gray-400 rounded-r-md pl-12 pr-5 py-3 font-sans font-normal text-lg" placeholder="Search boat...">
                <img src="{{ asset('/images/search.png') }}" alt="" class="absolute top-3 left-3 h-8">               
            </div>
        </div>
        <div class="flex flex-row space-x-4 justify-between">
            <div class="flex w-4/5 h-[400px] border border-black rounded-sm">
            
            </div>
            <div class="flex flex-col overflow-y-scroll w-1/5 h-[400px]">

            </div>
        </div>
    </div>
</body>
</html>