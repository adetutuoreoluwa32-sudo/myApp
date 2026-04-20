<!DOCTYPE html>
<html>
<head>
    <title>{{ $post->title }}</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <div class="max-w-3xl mx-auto py-10 px-4">

        <a href="/" class="text-blue-500 mb-4 inline-block">← Back</a>

        <div class="bg-white p-8 rounded-xl shadow">

            <!-- TITLE -->
            <h1 class="text-3xl font-bold mb-3">
                {{ $post->title }}
            </h1>

            <!-- META -->
            <p class="text-gray-500 mb-6">
                By {{ $post->author ?? 'Unknown' }} • 
                {{ optional($post->created_at)->format('M d, Y') }}
            </p>

            <!-- IMAGE -->
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}"
                     class="w-full h-64 object-cover rounded-lg mb-6">
            @endif

            <!-- CONTENT -->
            <div class="text-gray-800 leading-relaxed space-y-4 mb-6">
                {{ $post->content }}
            </div>

            <!-- COMMENTS SECTION -->
            <hr class="my-6">

            <h2 class="text-xl font-bold mb-4">Comments 💬</h2>

            <!-- COMMENT FORM -->
            @auth
            <form method="POST" action="{{ route('comments.store', $post->id) }}">
                @csrf

                <textarea name="content"
                          class="w-full border rounded p-3 mb-3"
                          placeholder="Write a comment..."></textarea>

                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Post Comment
                </button>
            </form>
            @else
                <p class="text-gray-500 mb-4">
                    You must be logged in to comment.
                </p>
            @endauth

            <!-- COMMENTS LIST -->
            @forelse ($post->comments as $comment)
                <div class="bg-gray-100 p-3 rounded mt-3">

                    <p class="text-sm text-gray-700">
                        <strong>{{ $comment->user->name }}</strong>
                    </p>

                    <p class="text-gray-800">
                        {{ $comment->content }}
                    </p>

                    <p class="text-xs text-gray-400 mt-1">
                        {{ $comment->created_at->diffForHumans() }}
                    </p>

                </div>
            @empty
                <p class="text-gray-500 mt-3">No comments yet.</p>
            @endforelse

        </div>

    </div>

</body>
</html>