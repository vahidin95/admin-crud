<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use Illuminate\Support\Facades\DB;
use Image;
use Storage;

class PostsController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

     public function search(Request $request)
    {
        $search = $request->get('search');
        $posts = DB::table('posts')->where('name', 'like', '%'.$search .'%')->latest()->paginate(5);
        $users = User::all();
        $categories = Category::all();
        $activePosts = Post::active()->get();
        $inactivePosts = Post::inactive()->get();
        return view('posts.index', compact('posts', 'activePosts', 'inactivePosts','categories', 'users'));
    }

    public function index()
    {
        $users = User::all();
        $categories = Category::all();
        $activePosts = Post::active()->get();
        $inactivePosts = Post::inactive()->get();
        //dd($activePosts);
        $posts = Post::latest()->paginate(5);
        return view('posts.index', compact('posts', 'activePosts', 'inactivePosts', 'categories', 'users'));
    }

    public function create()
    {
        $users = User::all();
        $categories = Category::all();
        return view('posts.create', compact('categories', 'users'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'body' => 'required',
            'user_id' => 'required',
            'status' => 'required',
            'image' => 'file|image|max:10000',
            'category_id' => 'required'
        ]);

        if($request->hasFile('image')){
        $image = $request->file('image');
        $new_image = time() .'.'. $image->getClientOriginalExtension();
        $image->move(public_path('images/posts'), $new_image);
        }else{
            $new_image = '../avatar.png';
        }
        //dd();
        $data = array(
            'name' => $request->name,
            'body' => $request->body,
            'user_id' => $request->user_id,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'image' => $new_image,
             );

        $activePosts = Post::active()->get();
        $inactivePosts = Post::inactive()->get();
        $users = User::all();
        $categories = Category::all();
        $post = Post::create($data);
        $posts = Post::latest()->paginate(5);

        session()->flash('message', 'You successfully added new post');
        return view('posts.index', compact('posts', 'post', 'activePosts', 'inactivePosts', 'categories', 'users'));
    }

    public function show($id)
    {
       $post = Post::findOrFail($id);
       $users = User::all();
       $categories = Category::all();
       return view('posts.show', compact('post'));
    }


    public function edit($id)
    {
       $users = User::all();
       $categories = Category::all();
       $post = Post::findOrFail($id);
       return view('posts.edit', compact('post', 'categories', 'users'));

    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

            $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'user_id' => 'required',
            'body' => 'required',
            'status' => 'required',
            'image' => 'file|image|max:10000'
        ]);

        if($request->hasFile('image')){

        $image = $request->file('image');
        $new_image = time() .'.'. $image->getClientOriginalExtension();
        $image->move(public_path('images/posts'), $new_image);
        //$old_image = $post->image; ne radi!
        //Storage::delete($old_image);
        }else{
            $new_image = '../avatar.png';
        }
        //dd();
        $data = array(
            'name' => $request->name,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'body' => $request->body,
            'status' => $request->status,
            'image' => $new_image,
             );

        $activePosts = Post::active()->get();
        $inactivePosts = Post::inactive()->get();

        $post->update($data);
        $users = User::all();
        $categories = Category::all();
        $posts = Post::latest()->paginate(5);
        session()->flash('message', "You have successfuly updated your post $request->name .");
        return view('posts.index', compact('posts', 'post', 'activePosts', 'inactivePosts', 'categories'));

    }


    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post->image === '../avatar.png') {
            $post->image = 'slika';
        }else{
        //dd($post->image);
        Storage::delete($post->image);
        }
        $post->delete();
        session()->flash('message', 'You successfully deleted a post');
        return redirect()->back();
    }
}
