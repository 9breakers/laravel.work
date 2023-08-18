<?php

namespace App\Http\Controllers;

use App\Filters\PostFilter;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    public function index(PostFilter $request){

        $posts = Post::filter($request)->paginate(10);
        $categories= Category::all();
        $Tags =Tag::all();

   return view('main.home',compact('posts', 'categories', 'Tags'));
    }


    public function popular(PostFilter $request){
        $posts = Post::orderBy('views', 'desc')->paginate(12);
        $categories= Category::all();
        $Tags =Tag::all();
        return view('main.popular', compact('posts','categories', 'Tags'));

    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $imagePath = public_path("storage/{$post->image}");


        $image = Image::make($imagePath);

        $image->resize(350, 200, function ($constraint) {
            $constraint->upsize();
            $constraint->aspectRatio();

        });


        $post->incrementViews(); // Збільшуємо кількість переглядів
        return view('main.show', compact('post', 'image'));
    }





}
