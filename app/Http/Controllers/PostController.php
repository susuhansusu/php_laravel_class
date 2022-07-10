<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\Category_post;


class PostController extends Controller
{
    
    public function index(Request $request)
        {
            //$posts = Post::all();
            // $posts = DB::table('posts')
            //         ->join('users', 'posts.user_id', '=', 'users.id')
            //         ->select('posts.*', 'users.name as name')
            //         ->paginate(3);


            // $posts = Post::select('posts.*', 'users.name as author')
            // ->join('users', 'posts.user_id', '=', 'users.id')
            // ->orderby('id', 'desc')
            // ->paginate(3);

            // $posts = Post::where('title', 'like', '%' . $request->search . '%')
            // ->orderBy('id', 'desc')
            // ->paginate(3);

            $posts = Post::where('title', 'like', '%' . $request->search . '%')
            ->select('posts.*')
            ->orderBy('id', 'desc')
            ->paginate(5);


            //dd($posts);
            return view('posts.index', compact('posts'));
        }

    public function create()
        {
            $categories = Category::all();
            return view('posts.create', compact('categories'));

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

            //$post->title = request('title');
            //$post->body = request('body');
            // $post->title = $request->title;
            // $post->body = $request->body;

            // $post->created_at = now();
            // $post->updated_at = now();
            // $post->save();
            //Post::create($request->except(['']));

            //Post::create($request->only(['title', 'body']));

            $file = $request->file('image_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $dir = public_path('upload/images');
            $file->move($dir, $filename);
            $imagePath = '/upload/images' . '/' .$filename;

            $post = new Post();
            $post = $post::create([
                'title' => $request->title,
                'body' => $request->body,
                'user_id' => auth()->id(),
                'image_path' => $imagePath,
            ]);

            //$post = auth()->user()->posts()->create($request->only('title', 'body','image_path'));

            foreach($request->category as $category)
            {
                $category_post = Category_post::create([
                    'post_id' => $post->id,
                    'category_id' => $category,
                ]);

            }
            return redirect('/posts');
        }
    
    public function edit($id)
        {
   
            $post = Post::find($id);
            $categories = Category::all();             
            return view('posts.edit',compact('post', 'categories'));
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
            // $file = $request->file('image_path');
            // $filename = time() . '_' . $file->getClientOriginalName();
            // $dir = public_path('upload/images');
            // $file->move($dir, $filename);
            // $imagePath = '/upload/images' . '/' .$filename;

            $post = Post::find($id);
            $post->title = $request->title;
            $post->body = $request->body;
            //$post->image_path = $imagePath;
            $post->updated_at = now();
            $post->save();

            Category_post::where('post_id', '=', $id)->delete();

            foreach($request->category as $category)
            {
                $category_post = Category_post::create([
                    'post_id' => $post->id,
                    'category_id' => $category,
                ]);

            }            

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
        // $post = Post::where('posts.id', $id)
        //         ->join('users', 'posts.user_id', '=', 'users.id')
        //         ->select('posts.*', 'users.name as author')
        //         ->first();

        $post = Post::find($id);
        
        //->join('categories', 'category_posts.category_id', '=', 'categories.id')
        //->get();
        //->find($id);

        //$categories = Category::all();

        //find($id);

        //dd($post);



        //->leftJoin('category_posts', 'category_posts.post_id', '=', 'posts.id')
        //->leftJoin('categories', 'category_posts.category_id', '=', 'categories.id')
        //->select('posts.*', 'category_posts.post_id', 'category_posts.category_id')
        //->first();

        return view('posts.show',compact('post'));

    }
    
}
