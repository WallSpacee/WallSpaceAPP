<nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
    <div class="flex lg:flex-1">
        <a href="#" class="-m-1.5 p-1.5">
            <span class="sr-only">Your Company</span>
            <img class="h-8 w-auto" src="../img/logo.png" alt="">
        </a>
    </div>
    <div class="flex lg:hidden">
        <button @click="isOpen=true" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
            <span class="sr-only">Open main menu</span>
            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>
    </div>
    <div class="hidden lg:flex lg:gap-x-12">
        <a href="/" class="text-sm/6 font-semibold text-gray-900">Home</a>
        <a href="/posts" class="text-sm/6 font-semibold text-gray-900">Post</a>
        <a href="/about" class="text-sm/6 font-semibold text-gray-900">Marketplace</a>
        <a href="#" class="text-sm/6 font-semibold text-gray-900">Company</a>

        @if(Auth::check() && Auth::user()->role === 'admin')
            <a href="/admin/dashboard" class="text-sm/6 font-semibold text-gray-900">Admin Dashboard</a>
            <a href="/admin/posts" class="text-sm/6 font-semibold text-gray-900">Manage Posts</a>
        @endif
    </div>
    <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        @if(Auth::check())
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-sm/6 font-semibold text-gray-900">
                    Log Out <span aria-hidden="true">&rarr;</span>
                </button>
            </form>
        @else
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <a href="/login" class="text-sm/6 font-semibold text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>
            </div>
        @endif
    </div>
</nav>
