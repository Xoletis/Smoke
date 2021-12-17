<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\UserDownloadGames;
use App\Models\UserLikeGames;
use http\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\Types\False_;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index(){

        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'authors'])
            )->simplePaginate(9)->withQueryString()
        ]);
    }

    public function show(Post $post){

        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function delete(Post $post){
        $post->delete();
        return redirect('/')->with('success', 'Suppression Réussite');
    }

    public function create(){

        return view('posts.create');
    }

    public function store(){
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'image' => 'required',
            'excerpt' => 'required',
            'descritption' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'link' => 'required'
        ]);

        $attributes['user_id'] = auth()->id();

        Post::create($attributes);

        return redirect('/');
    }

    public function download(Post $post){
        if(auth()) {
            if(UserDownloadGames::user($post) == false){
                $post->update(['nbDownload' => $post->nbDownload + 1]);

                UserDownloadGames::create([
                    'user_id' => auth()->id(),
                    'post_id' => $post->id
                ]);
            }
        }

        return Redirect::to($post->link);
    }

    public  function modify(Post $post){
        return view('posts.modify',
        [
         'post' => $post
        ]);
    }

    public function update(Post $post){
        $attribut = request()->validate([
            'title' => 'required',
            'image' => 'required',
            'excerpt' => 'required',
            'descritption' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'link' => 'required'
        ]);

        $post->update([
            'title' => $attribut['title'],
            'image' => $attribut['image'],
            'excerpt' => $attribut['excerpt'],
            'descritption' => $attribut['descritption'],
            'category_id' => $attribut['category_id'],
            'link' => $attribut['link']
        ]);

        return redirect('/')->with('Modification réusie');
    }

    public function like(Post $post){
        if (UserLikeGames::userPost($post, auth()->user()) == false) {
                $post->update(['nbLike' => $post->nbLike + 1]);

                UserLikeGames::create([
                    'user_id' => auth()->id(),
                    'post_id' => $post->id,
                    'like' => '1'
                ]);
        }
        return back();
    }

    public function unlike(Post $post){
        $post->update(['nbLike' => $post->nbLike - 1]);
        DB::table('user_like_games')->where('user_id', '=', auth()->id())->where('post_id', '=', $post->id)->delete();
        return back();
    }
}
