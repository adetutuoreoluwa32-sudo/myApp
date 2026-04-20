<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">

    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Create Post</h1>

        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block mb-1">Title</label>
                <input type="text" name="title" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Author</label>
                <input type="text" name="author" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Content</label>
                <textarea name="content" class="w-full border p-2 rounded" rows="5" required></textarea>
            </div>

            <div class="mt-4">
    <label class="block font-medium">Post Image</label>
    <input type="file" name="image" class="mt-1 block w-full">
</div>

            <button class="bg-blue-500 text-white px-4 py-2 rounded">
                Save Post
            </button>
        </form>
    </div>

</body>
</html>