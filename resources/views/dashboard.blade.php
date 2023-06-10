@extends('layout',[$title = 'Dashboard'])

@section('content')
    <x-search class="mt-6"/>
    <div class="flex flex-row space-x-2 mt-2 items-end pb-3 md:h-[500px]">
        <div id="map" class="flex w-[70%] h-[90%] border border-black rounded-md">

        </div>
        <div class="flex flex-col w-[30%] h-[90%] overflow-y-scroll">

        </div>
    </div>

    <link rel="stylesheet" href="{{ asset('/css/leaflet.css') }}">
    <script src="{{ asset('/js/leaflet.js') }}"></script>
    <script src="{{ asset('/js/map.js') }}"></script>
@endsection