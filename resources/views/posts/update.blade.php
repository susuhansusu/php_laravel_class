<form action="/posts/update/{{ $post->id }}" method="POST">
    @csrf

    <label>Post Title</label>
    <input type="text" name="title" value="{{ $post->title }}">
    <br><br>

    <label>Post Body</label>
    <textarea name="body">
        {{ $post->body }}
    </textarea>
    <br><br>

    <button type="submit">Save this in DB</button>
</form>