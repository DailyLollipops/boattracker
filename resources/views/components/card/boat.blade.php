<div id="boat-{{ $boat->id }}" data-id="{{ $boat->id }}" class="boat grid relative">
    <div class="w-full flex flex-col space-y-1 px-6 py-3 border border-gray-300 rounded-md">
        <div class="flex flex-row justify-between items-center mb-2">
            <p class="font-sans font-semibold text-md text-gray-600">Boat ID: {{ $boat->id }}</p>
            <div class="flex flex-row justify-end items-center space-x-3">
                <img src="{{ asset('/images/update.svg') }}" alt="Update" title="Update" class="update h-4 cursor-pointer">
                <img data-type="boat" data-id="{{ $boat->id }}" src="{{ asset('/images/delete.svg') }}" alt="Delete" title="Delete" class="delete h-4 cursor-pointer">
            </div>
        </div>
        <div class="flex flex-row justify-between items-center">
            <p class="font-sans font-medium text-sm text-gray-400">
                Attached Tracker: <span class="text-gray-600">{{ $boat->tracker == null ? 'None' : $boat->tracker->serial }}</span>
            </p>
            <img id="boat-{{ $boat->id }}-show-tracker-info" src="{{ asset('/images/info.svg') }}" alt="More info" title="More info" class="show-tracker-info h-4 cursor-pointer">
        </div>
        <div class="flex">
            <p class="font-sans font-medium text-sm text-gray-400">Current Location:

                @if($boat->latitude != null && $boat->longitude != null)
                    <span class="text-gray-600">{{ $boat->latitude.', '.$boat->longitude }}</span>
                @else
                    <span class="text-gray-600">No tracks yet</span>
                @endif

            </p>
        </div>
        <div class="flex">
            <p class="font-sans font-medium text-sm text-gray-400">
                Name: <span class="text-gray-600">{{ $boat->name }}</span>
            </p>
        </div>
        <div class="flex">
            <p class="font-sans font-medium text-sm text-gray-400">
                License: <span class="text-gray-600">{{ $boat->license }}</span>
            </p>
        </div>
        <div class="flex">
            <p class="font-sans font-medium text-sm text-gray-400">
                Type: <span class="text-gray-600">{{ $boat->type }}</span>
            </p>
        </div>
        <div class="flex">
            <p class="font-sans font-medium text-sm text-gray-400">
                Color: <span class="text-gray-600">{{ $boat->color }}</span>
            </p>
        </div>
        <div class="flex flex-row justify-between items-center">
            <p class="font-sans font-medium text-sm text-gray-400">
                Owner: <span class="text-gray-600">{{ $boat->owner->name }}</span>
            </p>
            <img id="boat-{{ $boat->id }}-show-owner-info" src="{{ asset('/images/info.svg') }}" alt="More info" title="More info" class="show-owner-info h-4 cursor-pointer">
        </div>
        <div id="tracker-{{ $boat->id }}-info" class="tracker-info hidden absolute top-16 right-6 z-10 flex flex-col space-y-2 p-2 border border-gray-200 bg-white rounded-md">
            
            @if($boat->tracker != null)
                <p class="font-sans font-medium text-sm text-gray-600">Tracker ID: {{ $boat->tracker->id }}</p>
                <p class="font-sans font-normal text-sm text-gray-600">Serial Number: {{ $boat->tracker->serial }}</p>
            @else
                <p class="font-sans font-normal text-sm text-gray-600">No tracker attached</p>
            @endif

        </div>
        <div id="owner-{{ $boat->id }}-info" class="owner-info hidden absolute top-52 right-6 z-10 flex flex-col space-y-2 p-2 border border-gray-200 bg-white rounded-md">
            <p class="font-sans font-normal text-sm text-gray-600">Name: {{ $boat->owner->name }}</p>
            <p class="font-sans font-normal text-sm text-gray-600">Contact: {{ $boat->owner->contact }}</p>
            <p class="font-sans font-normal text-sm text-gray-600">Barangay: {{ $boat->owner->barangay }}</p>
        </div>
    </div>
</div>