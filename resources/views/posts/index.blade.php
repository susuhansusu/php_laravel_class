
<h1> Post List</h1>
<a herf="/post/create">Create A Post</a>
<ul>
@foreach($posts as $post)
    <li>
        <a href="/posts/show/{{ $post->id }}">{{ $post->title }}</a>
        [<a href="/posts/edit/{{ $post->id }}">Edit</a>]
        [<a href="/posts/delete/{{ $post->id }}">Delete</a>]
        <br><br>
    </li>
    @endforeach
</ul>
