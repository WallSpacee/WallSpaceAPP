<x-layout-post>
    <div class="bg-gray-100 py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <h2 class="text-pretty text-4xl font-bold tracking-tight text-gray-800 sm:text-5xl">Dashboard Admin</h2>

            <div class="mt-10 bg-white shadow-md rounded-lg p-6">
                <h3 class="text-2xl font-bold text-gray-700">Daftar Postingan</h3>
                <div class="mt-4">
                    <table class="min-w-full border border-gray-300">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b text-left">Judul</th>
                                <th class="py-2 px-4 border-b text-left">Penulis</th>
                                <th class="py-2 px-4 border-b text-left">Tanggal</th>
                                <th class="py-2 px-4 border-b text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr class="hover:bg-gray-50">
                                <td class="py-2 px-4 border-b">{{ $post->title }}</td>
                                <td class="py-2 px-4 border-b">{{ $post->author }}</td>
                                <td class="py-2 px-4 border-b">{{ $post->created_at->format('d M Y') }}</td>
                                <td class="py-2 px-4 border-b">
                                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                                    </form>

                                    {{-- <form action="#"><button type="submit" class="text-red-600 hover:text-red-800">Hapus</button></form> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Menampilkan link pagination -->
                <div class="mt-6">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout-post>
