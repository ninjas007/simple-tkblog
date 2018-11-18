<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class SearchController extends Controller
{
    public function search(Request $request)
    {
    	$query = $request->input('search');
    	$posts = Post::where('title', 'LIKE', '%' . $query. '%')->get();
    	$categories = new Category;
    	return view('search.result', compact('posts', 'categories'));
    }
}
