<div id="tracker-{{ $tracker->id }}" data-id="{{ $tracker->id }}" class="tracker grid relative">
    <div class="w-full flex flex-col space-y-3 px-6 py-3 border border-gray-300 rounded-md">
        <div class="flex flex-row justify-between items-center mb-2">
            <p class="font-sans font-semibold text-md text-gray-600">Tracker ID: {{ $tracker->id }}</p>
            <div class="flex flex-row justify-end items-center space-x-3">
                <img src="{{ asset('/images/update.svg') }}" alt="Update" title="Update" class="update h-4 cursor-pointer">
                <img data-type="tracker" data-id="{{ $tracker->id }}" src="{{ asset('/images/delete.svg') }}" alt="Delete" title="Delete" class="delete h-4 cursor-pointer">
            </div>
        </div>
        <div class="flex flex-col space-y-2">
            <p class="font-sans font-medium text-sm text-gray-400">
                Serial Number: <span class="text-gray-600">{{ $tracker->serial }}</span>
            </p>
        </div>
        <div class="flex flex-col space-y-2">
            <p class="font-sans font-medium text-sm text-gray-400">
                Current Location: <span class="text-gray-600">13.2323, 121.908</span>
            </p>
        </div>
        <div class="flex flex-row justify-between items-center">
            <p class="font-sans font-medium text-sm text-gray-400">
                Attached To: <span class="text-gray-600">{{ $tracker->boat() ? 'Boat ID '.$tracker->boat()->id : 'None' }}</span>
            </p>
            <img id="tracker-{{ $tracker->id }}-show-info" src="{{ asset('/images/info.svg') }}" alt="More info" title="More info" class="show-info h-4 cursor-pointer">
        </div>
        <div id="tracker-{{ $tracker->id }}-info" class="boat-info hidden absolute top-36 right-0 z-10 flex flex-col space-y-2 p-2 border border-gray-200 bg-white rounded-md">
            
            @if($tracker->boat())
                <p class="font-sans font-medium text-md text-gray-600">Boat ID: 1</p>
                <p class="font-sans font-normal text-sm text-gray-600">Name: Montenegro</p>
                <p class="font-sans font-normal text-sm text-gray-600">Type: Big</p>
                <p class="font-sans font-normal text-sm text-gray-600">Color: Red</p>
            @else
                <p class="font-sans font-medium text-md text-gray-600">Not attached to any boat</p>
            @endif

        </div>
    </div>
</div>