<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article/Blog</title>
    <!-- Include Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-lg mb-8">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <a href="{{ route('articles.index') }}" class="text-xl font-bold">Artikel/Blog Sederhana</a>
                </div>
                <div>
                    <a href="{{ route('articles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Buat Article</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-6">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @yield('content')
    </main>
    <footer class="bg-white shadow-lg mt-8">
        <div class="container mx-auto px-6 py-4">
            <p class="text-center text-gray-600">
                © {{ date('Y') }} Artikel/Blog Sederhana. dibantu AI.
                Created by [<i>Farid Abd Hfzh</i>]
            </p>
        </div>
    </footer>
</body>
</html>