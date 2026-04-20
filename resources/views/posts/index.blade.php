<!DOCTYPE html>
<html>
<head>
    <title>My Blog</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 animate-fadeIn">

    <!-- NAVBAR -->
    <nav class="bg-white shadow mb-8">
        <div class="max-w-5xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold">My Blog</h1>

            <div class="flex items-center gap-4">
                @auth
                    <span class="text-gray-600">{{ auth()->user()->name }}</span>

                    @if(auth()->user()->is_admin)
                        <a href="{{ route('posts.create') }}"
                           class="bg-blue-500 text-white px-3 py-1 rounded">
                           + Post
                        </a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="text-red-500">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-blue-500">Login</a>
                    <a href="{{ route('register') }}" class="text-blue-500">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <div class="max-w-5xl mx-auto px-4">

        <h2 class="text-3xl font-bold mb-6">Latest Posts</h2>

        @foreach ($posts as $post)
           <div class="bg-white p-6 rounded-xl shadow mb-6 
            hover:shadow-xl hover:-translate-y-1 
            transition duration-300 ease-in-out">
            @if($post->image)
    <img src="{{ asset('storage/' . $post->image) }}"
         class="w-full h-48 object-cover rounded-lg mb-4">
@endif

                <h2 class="text-2xl font-semibold mb-2">
                    {{ $post->title }}
                </h2>

                <p class="text-gray-500 text-sm mb-3">
                    By {{ $post->author ?? 'Unknown' }} • 
                    {{ optional($post->created_at)->format('M d, Y') }}
                </p>

                <p class="text-gray-700 mb-4">
                    {{ \Illuminate\Support\Str::limit($post->content, 120) }}
                </p>

                <div class="flex justify-between items-center">

                    <a href="{{ route('posts.show', $post->id) }}"
                       class="text-blue-500 font-medium">
                        Read More →
                    </a>
                    

                    @if(auth()->check() && auth()->user()->is_admin)
                        <div class="flex gap-2">

                            <a href="{{ route('posts.edit', $post->id) }}"
                               class="text-yellow-500">
                               Edit
                            </a>

                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500">Delete</button>
                            </form>

                        </div>
                    @endif

                </div>
            </div>
        @endforeach

        @foreach ($posts as $post)
    <!-- your normal post card -->
@endforeach


<h2 class="text-2xl font-bold mt-10 mb-4">🌐 External Posts</h2>

<div class="grid md:grid-cols-2 gap-6">

@foreach ($externalPosts as $post)
    <div class="bg-white p-5 rounded-xl shadow hover:shadow-lg transition">

        <span class="text-xs text-blue-500 font-semibold">External</span>

        <h3 class="text-lg font-bold mt-2 mb-2">
            {{ $post['title'] }}
        </h3>

        <p class="text-gray-600 text-sm mb-3">
            {{ \Illuminate\Support\Str::limit($post['body'], 100) }}
        </p>

        <p class="text-xs text-gray-400">
            Source: API
        </p>

    </div>
@endforeach

</div>

</body>
</html>