<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use http\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index(){

        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'authors'])
            )->simplePaginate(24)->withQueryString()
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
        $post->update(['nbDownload' => $post->nbDownload + 1]);

        return Redirect::to($post->link);
    }
}
