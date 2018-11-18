<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Post;
use Storage;

class PostController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }
    
    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();
        $tags = Tag::orderBy('id', 'decs')->paginate(5);;

        return view('blog.index', compact('posts', 'tags', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // view ke halaman blog/create
        $categories = Category::all();
        $tags = Tag::all();
        $posts = Post::orderBy('id', 'decs')->paginate(10);

        return view('blog.create', compact('categories', 'tags', 'posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:100',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        $posts = New Post;
        $posts->title = $request->title;
        $posts->slug = str_slug($posts->title);
        $posts->content = strip_tags($request->content);
        $posts->category_id = $request->category_id;

        // cek file gambar
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $fileName);
            $posts->image = $fileName;
        }

        $posts->save();
        $posts->tags()->sync($request->tags);


        return back()->withInfo('Post baru berhasil dibuat');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // show data single page
        $posts = Post::where('slug', $slug)->first();
        $tags = Tag::orderBy('id', 'decs')->paginate(4);
        $categories = Category::orderBy('id', 'decs')->paginate(5);
        return view('blog.show', compact('posts', 'categories', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('blog.edit', compact('posts', 'categories', 'tags'));
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
        $request->validate([
            'title' => 'required|max:100',
            'content' => 'required',
            'category_id' => 'required',
        ]);

        $posts = Post::find($id);
        $posts->title = $request->title;
        $posts->category_id = $request->category_id;
        $posts->content = strip_tags($request->content);

        // cek file gambar
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $fileName);

            $oldFilename = $posts->image;
            \Storage::delete($oldFilename);
            $posts->image = $fileName;
        }

        $posts->update();
        $posts->tags()->sync($request->tags);

        return back()->withInfo('Post telah berhasil diedit');
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
        $post->tags()->detach(); // menghapus tags relasi di db ketika post dihapus
        Storage::delete($post->image); // menghapus image di storage ketika post dihapus

        $post->delete();

        return back()->withInfo('Post berhasil di delete');
    }
}
