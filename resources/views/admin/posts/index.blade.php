@extends('admin.layouts.layouts')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Всі пости</h2>
                </div>

                <div class="card-body">
                    <a href="{{route('post.create')}}" class="btn btn-primary mb-3">Додати пост</a>

                    @if (count($posts))
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th style="width: 30px">#</th>
                                    <th>Назва</th>
                                    <th>Slug</th>
                                    <th>Ціна</th>
                                    <th>Картинка</th>
                                    <th>Кількість</th>
                                    <th>Tag</th>
                                    <th>Категорія</th>
                                    <th>Перегляди</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->name }}</td>
                                        <td>{{ $post->slug }}</td>
                                        <td>{{ $post->price }}</td>
                                        <td><img src="{{$post->getImage() }}" alt="Зображення">
                                        </td>
                                        <td>{{ $post->quantity }}</td>
                                        <td>{{ $post->tags->pluck('name')->join(',  ') }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>{{ $post->views }}</td>

                                        <td>
                                            <a href="{{ route('post.edit', ['post' => $post->id]) }}" class="btn btn-info btn-sm float-left mr-1">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('post.destroy', ['post' => $post->slug]) }}" method="post" class="float-left">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Підтвердити видалення')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>Постів поки нема</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
