<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class PostController extends Controller
{

    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('categories')->paginate(20);
        // dd($posts);
        $categories = Category::all();
        return view('admin.post.index')->with(['posts' => $posts]);
                    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        $categories = Category::all();
       
        return view('admin.post.create')->with(['categories' => $categories]);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $user_id = Auth::id();
        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' =>$request->content,
            'user_id' => $user_id
        ]);
        
        $post = Post::latest()->first();

        $categories = $request->categories;

        foreach( $categories as $category ) {
            DB::table('categories_posts')->insert([
                'post_id' => $post->id,
                'category_id' => $category
            ]);
        }
       
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.post.edit')
                ->with(['post' => $post])
                ->with(['categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // dd($request);
        Post::where('id', $posts->id)->update([
            'title' => $request->title,
            'slug' =>Str::slug($request->title),
            'content' =>$request->content,
        ]);

        DB::table('categories_posts')->where('post_id', $post->id )->delete();

        $categories = $posts->categories;

        foreach( $categories as $category ) {
            DB::table('categories_posts')->insert([
                'post_id' => $post->id,
                'category_id' => $category
            ]);
        }
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        Post::where('id', $id)->delete();

        return redirect()->route('posts.index');

    }
}
