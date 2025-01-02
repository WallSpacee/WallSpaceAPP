<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white h-screen flex justify-center items-center">
    <div class="relative isolate px-6 pt-14 lg:px-8">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
          <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#008080] to-[#008080] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
          <div class="hidden sm:mb-8 sm:flex sm:justify-center"></div>
          <div class="text-center">
            <div class="p-6 rounded-lg shadow-lg w-96">
                <h2 class="text-2xl font-bold text-center mb-4">Register</h2>
                <form action="/register/submit" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Full Name</label>
                        <input type="text" name="name" id="name" class="w-full border border-gray-300 rounded-lg p-2" placeholder="Your Name" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">Email</label>
                        <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded-lg p-2" placeholder="you@example.com" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700">Password</label>
                        <input type="password" name="password" id="password" class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>
                    @if(session('success'))
                        <div class="bg-green-100 text-green-700 p-2 rounded-lg mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="text-red-500 text-sm mb-4">{{ $errors->first() }}</div>
                    @endif
                    <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-lg">Register</button>
                </form>
                <p class="mt-10 text-center text-sm/6 text-gray-500">
                    Sudah punya akun?
                    <a href="/login" class="font-semibold text-indigo-600 hover:text-indigo-500">Login disini</a>
                  </p>
            </div>
          </div>
        </div>
        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
          <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#008080] to-[#008080] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>

      </div>
</body>
</html>
