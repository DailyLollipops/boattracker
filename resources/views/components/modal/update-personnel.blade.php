<div id="update-personnel-overlay" class="hidden fixed w-full h-100 inset-0 z-10 overflow-hidden flex justify-center items-center brightness-50 backdrop-blur-sm">
</div>
<div id="update-personnel" class="hidden fixed inset-0 h-fit flex flex-col border drop-shadow-md shadow-lg modal-container bg-white w-1/3 mx-auto my-auto rounded z-50">
    <div class="flex flex-col self-end items-end ml-9 mr-2.5 mt-2.5">
        <svg id="update-personnel-exit" width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" class="flex justify-end fill-[#757575] cursor-pointer">
            <path d="M4 11.875L3.125 11L6.625 7.5L3.125 4L4 3.125L7.5 6.625L11 3.125L11.875 4L8.375 7.5L11.875 11L11 11.875L7.5 8.375L4 11.875Z"/>
        </svg>
    </div>
    <p class="flex self-center font-sans font-bold text-lg text-[#131B21] ml-9 mb-4 md:self-start">Update Personnel</p>
    <form action="/update/personnel" method="POST" id="update-personnel-form" class="w-full"> 
        @csrf
        <input type="text" id="update-personnel-id" name="id" class="hidden" value="{{ Auth::user()->id }}">
        <div class="w-full flex flex-col space-y-2 px-9 mb-3">
            <div class="flex flex-col relative">
                <input type="text" id="update-personnel-name" name="name" placeholder="Enter name..." class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex placeholder:text-xs" required="">
                <label for="update-personnel-name" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                    Name
                </label>
            </div>
            <div class="flex flex-col relative">
                <input type="text" id="update-personnel-email" name="email" placeholder="Enter email..." class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex placeholder:text-xs" required="">
                <label for="update-personnel-email" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                    Email
                </label>
            </div>
            <div class="flex flex-col relative">
                <input type="password" id="update-personnel-password-current" name="password-current" placeholder="Enter password..." class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex placeholder:text-xs" required="">
                <label for="update-personnel-password-current" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                    Current Password
                </label>
            </div>
            <div class="flex flex-col relative">
                <input type="password" id="update-personnel-password" name="password" placeholder="Enter password..." class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex placeholder:text-xs" required="">
                <label for="update-personnel-password" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                    Password
                </label>
            </div>
            <div class="flex flex-col relative">
                <input type="password" id="update-personnel-password-confirm" name="password-confirm" placeholder="Confirm password..." class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex placeholder:text-xs" required="">
                <label for="update-personnel-password-confirm" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                    Password
                </label>
            </div>
        </div> 
    </form>
    <div class="flex flex-row justify-end self-end space-x-2 mx-6 px-2 pb-3">
        <button id="update-personnel-cancel" type="button" class="px-2 py-1.5 font-sans font-medium text-sm text-[#1976D2] hover:text-gray-400">CANCEL</button>
        <button id="update-personnel-submit" type="button" class="px-2 py-1.5 font-sans font-medium text-sm text-[#1976D2] hover:text-gray-400">UPDATE</button>
    </div>
</div>