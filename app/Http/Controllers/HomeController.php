<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    public function index(){

        $posts = Post::with('category')->orderBy('id', 'desc')->paginate(12);
   return view('main.home',compact('posts'));
    }


    public function popular(Post $posts){
        $posts = Post::orderBy('views', 'desc')->paginate(12);

        return view('main.popular', compact('posts'));

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
