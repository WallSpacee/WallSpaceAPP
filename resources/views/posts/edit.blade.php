<x-layout-post>
    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <h2 class="text-pretty text-4xl font-bold tracking-tight text-gray-500 sm:text-5xl">Edit Postingan</h2>

            <form action="{{ route('posts.update', $post->id) }}" method="POST" class="mt-10">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                    <input type="text" name="title" id="title" value="{{ $post->title }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500" required>
                </div>
                <div class="mb-4">
                    <label for="body" class="block text-sm font-medium text-gray-700">Isi</label>
                    <textarea name="body" id="body" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500" required>{{ $post->body }}</textarea>
                </div>
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                    Update
                </button>
            </form>
        </div>
    </div>
</x-layout-post>
