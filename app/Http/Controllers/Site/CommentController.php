<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Comments\CreateRequest;
use App\Http\Requests\Site\Comments\Reply\CreateRequest as ReplyCreateRequest;
use App\Models\Comment;
use App\Models\CommentReply;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function postComment(CreateRequest $request, $postId)
    {
        if (auth()->check()) {

            $post = Post::find($postId);

            if (!$post) {
                return back()->withErrors('Unable to find the post, plaease refresh the webpage and try again');
            }

            Comment::create([
                'post_id' => $postId,
                'user_id' => auth()->id(),
                'comment' => $request->comment
            ]);
            $request->session()->flash('alert-success', 'Comment added successfully,it will be visible after admin approval');
        }
        return back();
    }

    /**
     * Summary of postCommentReply
     * @param \App\Http\Requests\Site\Comments\Reply\CreateRequest $request
     * @param mixed $commentId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCommentReply(ReplyCreateRequest $request, $commentId)
    {
        $commentId = $commentId;
        $comment = $request->comment;
        try {
            CommentReply::create([
                'comment_id' => $commentId,
                'user_id' => auth()->id(),
                'comment' => $comment
            ]);
        } catch (\Exception $ex) {
            return back()->withErrors($ex->getMessage());
        }
        $request->session()->flash('alert-success', 'Comment reply successfully');
        return back();
    }
    public function deleteCommentReply(Request $request)
    {
        $replyId = $request->reply_id;
        $reply = CommentReply::find($replyId);
        if (!$reply) {
            return back()->withErrors('Unabel to locate the reply,please refresh the webpage and try again, if still problem persists, contact the adminitrator');
        }
        $reply->delete();
        $request->session()->flash('alert-success', 'Comment deleted successfully');
        return back();
    }
}