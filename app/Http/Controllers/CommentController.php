<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;


class CommentController extends Controller
{
    public function makeComment(Request $request, Post $post)
    {
    	$comment = New Comment;
    	$comment->comment = $request->comment; // simpan request/inputan form comment kedalam variabel method comment
    	$comment->user_id = auth()->user()->id; // tangkap authentikasi login dari user yg comment / artinya harus login dulu baru komens
    	if (!isset($comments->user_id)) {
    		return view('auth/login')->withInfo('Silahkan login terlebih dahulu');
    	} else {
    		
    		$post->comments()->save($comment); // save method comment dari kelas pst kedalam object $comment

    		return back()->withInfo('Komentar telah Terkirim');
    	}

    }
}
