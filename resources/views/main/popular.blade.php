@extends('main.layouts.layouts')

@include('main.layouts.header')
@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                @foreach($posts as $post)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <a href="{{ route('posts.show', ['slug' => $post->slug]) }}">
                                <img class="card-img-top" src="{{ $post->getImage() }}" alt="...">
                            </a>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">

                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{$post->name}}</h5>
                                    <!-- Product price-->
                                    {{$post->price}}$
                                    <h5>{{$post->category->name}}</h5>
                                   Переглядів: <h5>{{$post->views}}</h5>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <!-- resources/views/product.blade.php -->
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <button class="btn btn-primary" type="submit"> Додати в кошик</button>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </section>
@endsection
