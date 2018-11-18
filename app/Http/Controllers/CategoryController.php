<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $categories = Category::Paginate(5);
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('category.create', compact('category'));
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
            
            'name' => 'required|max:100',  
        ]);

        $category = New Category;
        $category->name = $request->name;

        $category->save();

        return back()->withInfo('Kategori baru berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::all();
        $tags = Tag::orderBy('id', 'decs')->paginate(5); // untuk menampilkan semua tag disidebar
        $categories = Category::orderBy('id', 'decs')->paginate(5);// untuk menampilkan semua tag disidebar
        $categories_find = Category::find($id); // untuk menangkap parameter id yg dikirimkan
        return view('category.show', compact('categories', 'posts', 'tags', 'categories_find'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // // ambil data sesuai slug
        $category = Category::find($id);
        return $category;
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
            'name' => 'required|max:100'
        ]);

        $category = Category::find($id);
        $category->name = $request->name;

        $category->update();

        return back()->withInfo('Post telah berhasil diedit');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, Post $post)
    {
        // $category = Category::find($id);
        // $post = new Post;
        $post->category_id = null;
        $category->delete();

        return back()->withInfo('Kategori berhasil di delete');
    }
}
