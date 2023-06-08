<div id="id" class="blockbox grid relative">
    <div class="w-full flex flex-col space-y-3 px-8 py-3 border border-gray-300 rounded-md">
        <div class="flex flex-row justify-between items-center">
            <p class="font-sans font-semibold text-md text-gray-600">Block box 11</p>
            <img src="{{ asset('/images/update.svg') }}" alt="Update" title="Update" class="h-4 cursor-pointer">
        </div>
        <div class="flex flex-col space-y-2">
            <p class="font-sans font-medium text-sm text-gray-400">
                Current Location: <span class="text-gray-600">13.2323, 121.908</span>
            </p>
        </div>
        <div class="flex flex-row justify-between items-center">
            <p class="font-sans font-medium text-sm text-gray-400">
                Attached To: <span class="text-gray-600">Boat Id 4</span>
            </p>
            <img id="blockbox-id-show-info" src="{{ asset('/images/info.svg') }}" alt="More info" title="More info" class="show-info h-4 cursor-pointer">
        </div>
        <div id="blockbox-id-info" class="absolute top-24 right-0 flex flex-col space-y-2 p-2 border border-gray-200">
            <p class="font-sans font-medium text-md text-gray-600">Boat ID: 1</p>
            <p class="font-sans font-normal text-sm text-gray-600">Name: Montenegro</p>
            <p class="font-sans font-normal text-sm text-gray-600">Type: Big</p>
            <p class="font-sans font-normal text-sm text-gray-600">Color: Red</p>
        </div>
    </div>
</div>

<script>
    // var blockbox = document.getElementById()
</script>