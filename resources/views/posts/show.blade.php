<x-layout-post>
    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <h2 class="text-pretty text-4xl font-bold tracking-tight text-gray-500 sm:text-5xl">{{ $post->title }}</h2>
            <p class="mt-4 text-gray-600">{{ $post->body }}</p>
            <p class="mt-2 text-gray-500">Ditulis oleh: {{ $post->author }}</p>
            <a href="{{ route('posts.index') }}" class="mt-6 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                Kembali
            </a>
        </div>
    </div>
</x-layout-post>
