{{-- Register Owner --}}
<div id="register-owner-overlay" class="hidden fixed w-full h-100 inset-0 z-10 overflow-hidden flex justify-center items-center brightness-50 backdrop-blur-sm">
</div>
<div id="register-owner" class="hidden fixed inset-0 h-fit flex flex-col border drop-shadow-md shadow-lg modal-container bg-white w-1/3 mx-auto my-auto rounded z-50">
    <div class="flex flex-col self-end items-end ml-9 mr-2.5 mt-2.5">
        <svg id="register-owner-exit" width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" class="flex justify-end fill-[#757575] cursor-pointer">
            <path d="M4 11.875L3.125 11L6.625 7.5L3.125 4L4 3.125L7.5 6.625L11 3.125L11.875 4L8.375 7.5L11.875 11L11 11.875L7.5 8.375L4 11.875Z"/>
        </svg>
    </div>
    <p class="flex self-center font-sans font-bold text-lg text-[#131B21] ml-9 mb-4 md:self-start">Register Owner</p>
    <form action="/register/owner" method="POST" id="register-owner-form" class="w-full"> 
        @csrf
        <div class="w-full flex flex-col space-y-2 px-9 mb-3">
            <div class="flex flex-col relative">
                <input type="text" id="register-owner-name" name="name" placeholder="Enter owner name..." class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex placeholder:text-xs">
                <label for="register-owner-name" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                    Owner Name
                </label>
            </div>
            <div class="flex flex-col justify-between space-y-2 md:flex-row md:space-x-6 md:space-y-0">
                <div class="w-full flex flex-col relative md:w-1/2">
                    <input type="text" id="register-owner-contact" name="contact" placeholder="Enter owner number..." class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex placeholder:text-xs">
                    <label for="register-owner-name" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                        Owner Contact
                    </label>
                </div>
                <div class="w-full flex flex-col relative md:w-1/2">
                    <select id="register-owner-barangay" name="color" class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex">
                        <option value="null" class="text-sm">Select Barangay</option>
                        <option value="Blue" class="text-sm">Blue</option>
                        <option value="Green" class="text-sm">Green</option>
                        <option value="Red" class="text-sm">Red</option>
                        <option value="White" class="text-sm">White</option>
                        <option value="Yellow" class="text-sm">Yellow</option>
                    </select>
                    <label for="register-owner-barangay" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                        Barangay
                    </label>
                </div>
            </div>
        </div> 
    </form>
    <p class="font-sans font-normal text-gray-600 text-sm ml-9 mb-4">Owner already registered? <button type="button" id="register-boat-button" class="text-blue-600 underline">Register Boat</button></p>
    <div class="flex flex-row justify-end self-end space-x-2 mx-6 px-2 pb-3">
        <button id="register-owner-cancel" type="button" class="px-2 py-1.5 font-sans font-medium text-sm text-[#1976D2] hover:text-gray-400">CANCEL</button>
        <button id="register-owner-submit" type="button" class="px-2 py-1.5 font-sans font-medium text-sm text-[#1976D2] hover:text-gray-400">UPDATE</button>
    </div>
</div>

{{-- Register Boat --}}
<div id="register-boat-overlay" class="hidden fixed w-full h-100 inset-0 z-10 overflow-hidden flex justify-center items-center brightness-50 backdrop-blur-sm">
</div>
<div id="register-boat" class="hidden fixed inset-0 h-fit flex flex-col border drop-shadow-md shadow-lg modal-container bg-white w-1/3 mx-auto my-auto rounded z-50">
    <div class="flex flex-col self-end items-end ml-9 mr-2.5 mt-2.5">
        <svg id="register-boat-exit" width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" class="flex justify-end fill-[#757575] cursor-pointer">
            <path d="M4 11.875L3.125 11L6.625 7.5L3.125 4L4 3.125L7.5 6.625L11 3.125L11.875 4L8.375 7.5L11.875 11L11 11.875L7.5 8.375L4 11.875Z"/>
        </svg>
    </div>
    <p class="flex self-center font-sans font-bold text-lg text-[#131B21] ml-9 mb-4 md:self-start">Register Boat</p>
    <form action="/register/boat" method="POST" id="register-boat-form" class="w-full"> 
        @csrf
        <div class="w-full flex flex-col space-y-2 px-9 mb-3">
            <div class="flex flex-col relative">
                <input type="text" id="register-boat-name" name="name" placeholder="Enter boat name..." class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex placeholder:text-xs">
                <label for="register-boat-name" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                    Boat Name
                </label>
            </div>
            <div class="flex flex-col relative">
                <input type="text" id="register-boat-license" name="license" placeholder="Enter boat license..." class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex placeholder:text-xs">
                <label for="register-boat-license" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                    Boat License
                </label>
            </div>
            <div class="flex flex-col justify-between space-y-2 md:flex-row md:space-x-6 md:space-y-0">
                <div class="w-full flex flex-col relative md:w-1/2">
                    <select id="register-boat-type" name="type" class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex">
                        <option value="null" class="text-sm">Select Boat Type</option>
                        <option value="Small" class="text-sm">Small</option>
                        <option value="Medium" class="text-sm">Medium</option>
                        <option value="Large" class="text-sm">Large</option>
                    </select>
                    <label for="register-boat-type" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                        Boat Type
                    </label>
                </div>
                <div class="w-full flex flex-col relative md:w-1/2">
                    <select id="register-boat-color" name="color" class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex">
                        <option value="null" class="text-sm">Select Boat Color</option>
                        <option value="Blue" class="text-sm">Blue</option>
                        <option value="Green" class="text-sm">Green</option>
                        <option value="Red" class="text-sm">Red</option>
                        <option value="White" class="text-sm">White</option>
                        <option value="Yellow" class="text-sm">Yellow</option>
                    </select>
                    <label for="register-boat-color" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                        Boat Color
                    </label>
                </div>
            </div>
            <div class="w-full flex flex-col relative">
                <select id="register-boat-owner" name="owner" class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex">
                    <option value="null" class="text-sm">Select Owner</option>
                </select>
                <label for="register-boat-owner" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                    Select Owner
                </label>
            </div>
        </div> 
    </form>
    <p class="font-sans font-normal text-gray-600 text-sm ml-9 mb-4">Owner not found? <button type="button" id="register-owner-button" class="text-blue-600 underline">Register Owner</button></p>
    <div class="flex flex-row justify-end self-end space-x-2 mx-6 px-2 pb-3">
        <button id="register-boat-cancel" type="button" class="px-2 py-1.5 font-sans font-medium text-sm text-[#1976D2] hover:text-gray-400">CANCEL</button>
        <button id="register-boat-submit" type="button" class="px-2 py-1.5 font-sans font-medium text-sm text-[#1976D2] hover:text-gray-400">UPDATE</button>
    </div>
</div>

<script src="{{ asset('/js/register.js') }}"></script>