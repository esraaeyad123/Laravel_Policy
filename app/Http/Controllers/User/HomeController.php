<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Model\user\category;
use App\Model\user\post;
use App\Like;

use App\Model\user\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class HomeController extends Controller
{
    public function index()
    {
        $posts = post::where('status',1)->orderBy('created_at','DESC')->paginate(5);
        return view('user.blog',compact('posts'));

    }
    public function tag(tag $tag)
    {
        $posts = $tag->posts();

        return view('user.blog',compact('posts'));
    }
    public function category(category $category)
    {
    $posts= $category->posts();

        return view('user.blog',compact('posts'));

    }
    public function postLikePost(Request $request)
    {
        $post_id = $request['postId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $post = Post::find($post_id);
        if (!$post) {
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('post_id', $post_id)->first();
        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }
}
