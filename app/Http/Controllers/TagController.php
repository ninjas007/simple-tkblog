<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Post;
use App\Category;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $tags = Tag::Paginate(3);
        return view('tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('tag.create', compact('tags'));
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
            'name' => 'required|max:30',
        ]);

        // $tags = $request->all(); // yg ini dia ambil dengan tokennya
        // $tags = Tag::all(); yg ini ga bisa di pakai method save
        $tags = New Tag;
        $tags->name = $request->name;

        $tags->save();

        return back()->withInfo('Tag berhasil di save');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::Paginate(5);
        $categories = Category::orderBy('id', 'decs')->paginate(5);// untuk menampilkan semua tag disidebar
        $tags = Tag::orderBy('id', 'decs')->paginate(4); // untuk menampilkan semua tag disidebar
        $tags_find = Tag::find($id); // untuk menangkap parameter id yg dikirimkan
        return view('tag.show', compact('tags', 'posts', 'categories', 'tags_find'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'name' => 'required|max:30',
        ]);

        $tags = Tag::find($id);
        $tags->name = $request->name;

        $tags->update();

        return back()->withInfo('Tag berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tags = Tag::find($id);
        $tags->delete();

        return back()->withInfo('Tag berhasil di Hapus');
    }
}
