<nav>
    <div class="flex flex-row w-screen h-12 justify-between items-center px-8 py-2 bg-blue-600">
        <div class="flex justify-start">
            <a href="/">
                <img src="{{ asset('/images/logo.png') }}" alt="Logo" class="h-8">
            </a>
        </div>
        <div class="hidden flex-row space-x-8 justify-end items-center px-2 md:flex">
            <a href="/dashboard" class="font-sans font-semibold text-white text-md">Dashboard</a>
            <a href="/admin" class="font-sans font-semibold text-white text-md">Admin</a>
            <a href="/logout" class="font-sans font-semibold text-white text-md">Logout</a>
        </div>
    </div>
</nav>