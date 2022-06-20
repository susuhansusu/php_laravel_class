<h1>Create A Post Form</h1>

<!-- @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)

        <li style="color:red"> {{$error}}</li>

        @endforeach
    </ul>

@endif -->


<form action="/posts/store" method="POST">
    @csrf
    @method('POST')

    <label>Post Title</label>
        <input type="text" name="title">
        @error('title')
            <div style="color: red">{{ $message}}</div>
        @enderror

        <br><br>

    <label>Post Body</label>
        <textarea name="body"></textarea>
        @error('body')
            <div style="color: red">{{ $message}}</div>
        @enderror
        <br><br>

    <button type="submit">Create</button>

</form>