<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    
    public function index()
        {
            //$posts = Post::all();
            // $posts = DB::table('posts')
            //         ->join('users', 'posts.user_id', '=', 'users.id')
            //         ->select('posts.*', 'users.name as name')
            //         ->paginate(3);
            $posts = Post::select('posts.*', 'users.name as author')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->orderby('id', 'desc')
            ->paginate(3);
            
            return view('posts.index', compact('posts'));
        }

    public function create()
        {
            return view('posts.create');

            // $post = new create();
            // $post->title = "First Post";
            // $post->body = "First Post body";
            // $post->created_at = now();
            // $post->updated_at = now();
            
            // $post->save();

            // return view('post create');
        }

    public function store(PostRequest $request)
        {

            //$request->validate([
            //    'title'=> 'required',
            //    'body'=> 'required|min:5'
            //],[
            //    'title.required' => 'Fill the title.',
             //   'body.required' => 'Fill the body.'
            //]);
   
            $post = new Post();
            //$post->title = request('title');
            //$post->body = request('body');
            // $post->title = $request->title;
            // $post->body = $request->body;

            // $post->created_at = now();
            // $post->updated_at = now();
            // $post->save();

            $post->create([
                'title' => $request->title,
                'body' => $request->body,
                //'user_id' => Auth::id(),
                'user_id' => auth()->id(),
            ]);

            //Post::create($request->except(['']));

            //Post::create($request->only(['title', 'body']));
    
            return redirect('/posts');
        }
    
    public function edit($id)
        {
   
            $post = Post::find($id);
                
            return view('posts.edit',compact('post'));
        }

    public function update(PostRequest $request,$id)
        {
   
            //$request->validate([
            //    'title'=> 'required',
            //    'body'=> 'required|min:5'
            //],[
            //    'title.required' => 'Fill the title.',
             //   'body.required' => 'Fill the body.'
            //]);
            $post = Post::find($id);
            $post->title = $request->title;
            $post->body = $request->body;
            $post->updated_at = now();
            $post->save();

            return redirect('/posts');

        }

    public function destroy($id)
        {

            Post::destroy($id);

            return redirect('/posts');

        }
    
    public function show($id)
    {
        //$post = Post::find($id);
        $post = Post::where('posts.id', $id)
                ->join('users', 'posts.user_id', '=', 'users.id')
                ->select('posts.*', 'users.name as author')
                ->first();

        return view('posts.show',compact('post'));

    }
    
}
