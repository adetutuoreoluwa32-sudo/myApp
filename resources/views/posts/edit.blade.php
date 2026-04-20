<form method="POST" action="{{ route('posts.update', $post->id) }}">
    @csrf
    @method('PUT')

    <input type="text" name="title" value="{{ $post->title }}" />
    <input type="text" name="author" value="{{ $post->author }}" />
    <textarea name="content">{{ $post->content }}</textarea>

    <button>Update</button>
</form>