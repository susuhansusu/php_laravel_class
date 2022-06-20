<!-- @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)

        <li style="color:red"> {{$errors}}</li>

        @endforeach
    </ul>

@endif -->

<form action="/posts/update/{{ $post->id }}" method="POST">
    @csrf

    <label>Post Title</label>
    <input type="text" name="title" value="{{ $post->title }}">
    @error('title')
        <div style="color: red">{{$message}}</div>
    @enderror
    
    <br><br>

    <label>Post Body</label>
    <textarea name="body">{{ $post->body }}</textarea>
    @error('body')
        <div style="color: red">{{$message}}</div>
    @enderror
    <br><br>

    <button type="submit">Update</button>
</form>