<div id="personnel-{{ $personnel->id }}" data-id="{{ $personnel->id }}" class="{{ $personnel->id != 1 ? 'personnel' : 'admin'}} grid relative">
    <div class="w-full flex flex-col space-y-3 px-6 py-3 border border-gray-300 rounded-md">
        <div class="flex flex-row justify-between items-center mb-2">
            <p class="font-sans font-semibold text-md text-gray-600">Personnel ID: {{ $personnel->id }}</p>
            <div class="flex flex-row justify-end items-center space-x-3">

                @if($personnel->id != 1)
                    <img data-type="personnel" data-id="{{ $personnel->id }}" src="{{ asset('/images/delete.svg') }}" alt="Delete" title="Delete" class="delete h-4 cursor-pointer">
                @else
                    <img src="{{ asset('/images/update.svg') }}" id="update-personnel-button" alt="Update" title="Update" class="h-4 cursor-pointer">
                @endif

            </div>
        </div>
        <div class="flex flex-col space-y-2">
            <p class="font-sans font-medium text-sm text-gray-400">
                Name: <span class="text-gray-600">{{ $personnel->name }}</span>
            </p>
        </div>
        <div class="flex flex-col space-y-2">
            <p class="font-sans font-medium text-sm text-gray-400">
                Email: <span class="text-gray-600">{{ $personnel->email }}</span>
            </p>
        </div>
    </div>
</div>