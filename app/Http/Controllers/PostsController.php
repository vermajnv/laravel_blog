<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// here App is namespace for Model Post
use App\Post;
use DB;
class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Post::where('title', 'This is the Title')->get();
        // $postsData = Post::all();
        // return DB::select("SELECT * FROM posts");
        // $postsData = Post::orderBy('created_at', 'desc')->take(10)->get();
        $postsData = Post::orderBy('created_at', 'desc')->paginate(4);
        return view('posts.index')->with('postsData', $postsData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('cover_image')) 
        {
            // Get file name with extension
            $fileNameWithExt =  $request->file('cover_image')->getClientOriginalName(); 
            // Get just file Name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $fileExtension = $request->file('cover_image')->getClientOriginalExtension();
            // File Name To Store
            $fileNameToStore = $fileName . '_' . time() . '.' . $fileExtension;
            // Uplload Image
            $path = $request->file('cover_image')->storeAs('public/Cover-image', $fileNameToStore);
        }
        else 
        {
            $fileNameToStore = "no_Image.jpg";

        }
        // Inserting in database
        $post = new Post();
        $post->cover_image = $fileNameToStore;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->save();
        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postData = Post::find($id);
        return view('posts.show')->with('postData', $postData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postData = Post::find($id);
        if(auth()->user()->id != $postData->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Access');
        }
        return view('posts.edit')->with('postData', $postData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        // Inserting in database
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        return redirect('/posts/'.$post->id)->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id != $postData->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Access');
        }
        $recoveryPost = $post;
        $post->delete($id);
        return redirect('/posts')->with('success', 'Post Deleted Successfully', $recoveryPost);
    }
}
 