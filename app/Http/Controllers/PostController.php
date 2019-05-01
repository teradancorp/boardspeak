<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Commentreply;
use App\Post;
use Illuminate\Http\Request;
use Auth;
use Validator;

class PostController extends Controller
{
    public function createpost($link_id){
        $categories = \App\Category::where('category_type', 10)->get();
        //return view('boards/createboard', compact('categories'));
        return view('posts/createpost', ['link_id' => $link_id, 'categories' => $categories]);
    }

    public function save($link_id, Request $request){

        $this->validate(request(), [
            'post-title' => 'required',
            'post-description' => 'required',
            'post-topic-session' => 'required',
        ]);
        $x_array = array ('A','B','C','D','E','F','G','H','J','K','L','M','N','P','Q','R','S','T','U','V','W','X','Y','Z','1','2','3','4','5','6','7','8','9','0');
        $code = str_random(10) . (date('Y') - 2018) . $x_array[date('n')] . $x_array[date('j')] . $x_array[date('G') + 1] . date('i') . date('s');


        $board = \App\Board::where('board_id_link', $link_id)->first();
        $post = new Post();
        $user = Auth::user();
        $post->post_id_link = $code;
        $post->post_title = request('post-title');
        $post->post_description = request('post-description');
        $post->board_id = $board->id;
        $post->author_id = $user->id;
        if(request()->hasFile('postimage'))
        {
            $imgUpload = 'p_'.request('_token').'_'.time().'.'.request()->postimage->getClientOriginalExtension();
            $imgName = "/storage/posts/".$imgUpload;
            $request->postimage->storeAs('posts',$imgUpload);

        }
        else
            $imgName = asset ('img/cover/technology.jpg');
        $post->post_image = $imgName;

        if(request()->hasFile('postfile'))
        {
            $imgUpload = 'u_'.request('_token').'_'.time().'.'.request()->postfile->getClientOriginalExtension();
            $imgName = "/storage/uploads/".$imgUpload;
            $request->postfile->storeAs('uploads',$imgUpload);

        }



        $post->post_topic = request('post-topic');
        $post->post_topic_display = request('post-topic-session');
        $post->post_permalink = request('post-link');
        if(!$post->save()){
            App::abort(500, 'Error');
        }
        $board->increment('board_contributors', 1);
        if(!$board->save()){
            App::abort(500, 'Error');
        }
        else
            return redirect()->route('discussion', ['link_id' => $link_id]);
    }

    public function discussion($link_id){

        $post = \App\Post::where('post_id_link', $link_id)->first();
        $board = \App\Board::where('id', $post->board_id)->first();
        $user = \App\User::where('id', $board->author_id)->first();
        $comments = \App\Comment::where('post_id', $post->id)->get();
        $replies = \App\Commentreply::where('post_id', $post->id)->get();
        return view('posts/postdiscussion', compact('board', 'user', 'post', 'comments', 'replies'));
    }

    public function postComment(Request $request){
        $validator = Validator::make($request->all(), [
            'comment' => 'required',
        ]);

        if ($validator->passes()) {
            $comment = new Comment();

            $comment->comment_text = request('comment');
            $comment->post_id = request('text-post-id');
            $comment->author_id = request('text-author-id');
            $comment->author_username = request('text-author-username');
            $comment->save();

        }
        return redirect()->route('comments', ['link_id' => request('text-post-id-link')]);
    }

    public function postReplies(Request $request){

        $reply = new Commentreply();

        $reply->reply_text = request('reply');
        $reply->post_id = request('text-post-id');
        $reply->comment_id = request('text-comment-id');
        $reply->author_id = request('text-author-id');
        $reply->author_username = request('text-author-username');
        //$reply->save();

        if(!$reply->save()){
            App::abort(500, 'Error');
        }
        else
            return redirect()->route('comments', ['link_id' => request('text-post-id-link')]);
    }


}
