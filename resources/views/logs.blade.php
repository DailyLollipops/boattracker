@extends('layout',[$title = 'Logs'])

@section('content')
    <div class="overflow-y-scroll md:h-[600px] pr-8">
        <div class="flex mt-3">
            <div class="table w-full">
                <div class="table-header-group bg-gray-100">
                    <div class="table-row font-sans font-medium text-gray-600 text-md">
                        <div class="table-cell text-left w-1/6 pl-4 py-2">Date</div>
                        <div class="table-cell text-center w-1/3 p-2"></div>
                        <div class="table-cell text-right w-1/6 pr-4 py-2">Boat</div>
                    </div>
                </div>

                @foreach($logs as $log)
                    <div class="table-row-group">
                        <div class="table-row font-sans font-medium text-gray-600 text-md">
                            <div class="table-cell text-left w-1/6 pl-4 py-4">{{date('M-d-Y H:i:s A', strtotime($log->created_at))}}</div>
                            <div class="table-cell text-left w-1/3 p-4">

                                @if($log->status == 'safe')
                                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48" class="fill-green-500 w-4 h-4 inline">
                                        <path d="M480-80q-82 0-155-31.5t-127.5-86Q143-252 111.5-325T80-480q0-83 31.5-156t86-127Q252-817 325-848.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82-31.5 155T763-197.5q-54 54.5-127 86T480-80Z"/>
                                    </svg>
                                @elseif($log->status == 'warning')
                                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48" class="fill-yellow-500 w-4 h-4 inline">
                                        <path d="M480-80q-82 0-155-31.5t-127.5-86Q143-252 111.5-325T80-480q0-83 31.5-156t86-127Q252-817 325-848.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82-31.5 155T763-197.5q-54 54.5-127 86T480-80Z"/>
                                    </svg>
                                @elseif($log->status == 'restricted')
                                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48" class="fill-red-500 w-4 h-4 inline">
                                        <path d="M480-80q-82 0-155-31.5t-127.5-86Q143-252 111.5-325T80-480q0-83 31.5-156t86-127Q252-817 325-848.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82-31.5 155T763-197.5q-54 54.5-127 86T480-80Z"/>
                                    </svg>
                                @endif

                                Entered {{$log->status}} zone
                            </div>
                            <div class="table-cell text-right w-1/6 pr-4 py-4 relative">
                                {{$log->boat->name}}
                                <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48" data-id="{{ $log->id }}" class="show-info fill-gray-800 w-4 h-4 inline cursor-pointer">
                                    <title>More Info</title>
                                    <path d="M480-345 240-585l43-43 197 198 197-197 43 43-240 239Z"/>
                                </svg>
                                <div id="log-{{ $log->id }}-boat-info" class="boat-info hidden absolute flex top-10 right-8 z-10 flex-col space-y-2 p-2 border border-gray-200 bg-white rounded-md text-left">
                                    <p class="font-sans font-normal text-sm text-gray-600">Name: {{ $log->boat->name }}</p>
                                    <p class="font-sans font-normal text-sm text-gray-600">License: {{ $log->boat->license }}</p>
                                    <p class="font-sans font-normal text-sm text-gray-600">Type: {{ $log->boat->type }}</p>
                                    <p class="font-sans font-normal text-sm text-gray-600">Color: {{ $log->boat->color }}</p>
                                    <p class="font-sans font-normal text-sm text-gray-600">Owner: {{ $log->boat->owner->name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <script src="{{ asset('/js/log.js') }}"></script>
@endsection