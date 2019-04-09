<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use App\Comment;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request)
    {   
    	$this->validate($request, [
    		'message'	=>	'required'
    	]);

    	$comment = new Comment;
    	$comment->text = $request->get('message');
    	$comment->post_id = $request->get('post_id');
    	$comment->user_id = Auth::user()->id;
    	$comment->save();

    	return redirect()->back()->with('status', 'Ваш комментарий будет скоро добавлен!');
    }

      public function destroy($id)
    {  
       //$comment = Comment::find($id);
       //$comment = Comment::where('user_id', '=', Auth::user()->id)->get();
       //$comments = Comment::find($id);
       //$comment->remove();

       Comment::find($id)->remove();
       

       // $postID = Post::where('user_id', '=', Auth::user()->id)->get();
       // $postComment = Comment::pluck('post_id', 'id')->all();
       // $postAuthor = Comment::where('post_id', $postComment)->get();

       // $postAuthor->remove();
       return redirect()->back();
       //  || $comment->post_id==$postComment
    
    }

    public function getCommentAuthor()
    {
       // $postID = Post::where('user_id', '=', Auth::user()->id)->get();

       // $postComment = Comment::pluck('post_id', 'id')->all();

       // $postAuthor = Comment::where('post_id', Comment::pluck('post_id', 'id')->all())->get();
       // dd($postAuthor);

    // $comments = Comment::where('post_id', '=', Auth::user()->id)->get();
    // dd($comments);
    // $comment::where('post_id', $comment::pluck('post_id', 'id')->all()))


    // $var = $comment->postID==$comment::where('post_id', $comment::pluck('post_id', 'id')->all())->get;
    //    dd($var);

    }
}