<x-layout-post>
    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0 flex items-center gap-1">
                <h2 class="text-pretty text-4xl font-bold tracking-tight text-gray-500 sm:text-5xl">Wall</h2>
                <h2 class="text-pretty text-4xl font-bold tracking-tight text-teal-600 sm:text-5xl">Space</h2>
            </div>
            @if(Auth::check())
            <div class="mt-10">
                <a href="{{ route('posts.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                    Buat Postingan Baru
                </a>
            </div>
            @else
            <div class="mt-10">
                <a href="/login" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                    Buat Postingan Baru
                </a>
            </div>
            @endif

            <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @foreach ($posts as $post)
                <article class="flex max-w-xl flex-col items-start justify-between">
                    <div class="relative mt-8 flex items-center gap-x-4">
                        <img src="img/logo.png" alt="" class="size-10 rounded-full bg-gray-50">
                        <div class="text-sm/6">
                            <p class="font-semibold text-gray-900">
                                <a href="#">
                                    <span class="absolute inset-0"></span>
                                    {{ $post->author }}
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-x-4 text-xs">
                        <time datetime="{{ $post->created_at }}" class="text-gray-500">{{ $post['created_at']->diffForHumans() }}</time>
                    </div>
                    <div class="group relative">
                        <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600">
                            <a href="{{ route('posts.show', $post->id) }}">
                                <span class="absolute inset-0"></span>
                                {{ $post->title }}
                            </a>
                        </h3>
                        <p class="mt-5 line-clamp-3 text-sm/6 text-gray-600">{{ $post->body }}</p>
                        <div class="static">
                            <i class="fa-regular fa-heart text-gray-500 active:text-red-500 cursor-pointer"></i>
                            <i class="fa-regular fa-thumbs-up text-gray-500 active:text-blue-500 cursor-pointer"></i>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>


            <div class="mt-6">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-layout-post>
