@extends('main.layouts.layouts')

@section('content')

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog Post - Start Bootstrap Template</title>
</head>
<body>
<div class="container mt-5">
    <div class="row">
            <article>
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1">{{$post->name}}</h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2">Posted {{$post->created_at}}</div>
                    <!-- Post categories-->
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{$post->tags->pluck('name')->join(',  ') }}</a>

                </header>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded" src="{{$image->encode('data-url',100) }}"/></figure>
                <!-- Post content-->
                <section class="mb-5">
                    <p class="fs-5 mb-4">{{$post->description}}</p>
                </section>
            </article>

            <!-- Comments section-->
        <section class="mb-5">
            <div class="card bg-light">
                <div class="card-body">
                    <form class="mb-4" method="post" action="{{ route('store') }}">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <textarea class="form-control" name="text" rows="3" placeholder="Приєднуйтесь до обговорення та залиште коментар!"></textarea>
                        <button type="submit" class="btn btn-primary mt-3">Залишити коментар</button>
                    </form>

                    @if(count($comments) > 0)
                    @foreach($comments as $com)
                        <div class="d-flex justify-content-between mb-4">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <img class="rounded-circle" src="{{ asset('public/storage/avatar-' . $com->user_id . '.png') }}" width="40" alt="..." />
                                </div>
                                <div class="ms-3">
                                    <div class="fw-bold">{{$com->user->name}}</div>
                                    <!-- Поле дати зліва від імені -->
                                    <div class="text-muted fst-italic mb-2">{{$com->created_at->format('d.m.Y H:i')}}</div>
                                    {{$com->text}}
                                </div>
                            </div>
                            @if(Auth::user() && $com->user_id == Auth::user()->id)
                                <form method="post" action="{{ route('comments.destroy', ['comment' => $com->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Видалити</button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                    @else
                        <div class="alert alert-info">Коментарів немає</div>
                    @endif
                </div>
            </div>
        </section>
    </div>
        <!-- Side widgets-->

    </div>
</div>


</body>
</html>

@endsection
