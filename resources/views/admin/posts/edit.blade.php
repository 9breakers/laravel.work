@extends('admin.layouts.layouts')
@section('content')

    <h2 class="mb-3">Редагувати Пост</h2>
    <form action="{{ route('post.update', ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Назва</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $post->name }}">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Опис</label>
            <textarea class="form-control  @error('description') is-invalid @enderror " id="description" name="description">{{ $post->description }}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Ціна</label>
            <input type="number" class="form-control  @error('price') is-invalid @enderror" id="price" name="price" min="0" value="{{ $post->price }}">
            @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="quantity">Кількість</label>
            <input type="number" class="form-control  @error('quantity') is-invalid @enderror" id="quantity" name="quantity" min="0" value="{{ $post->quantity }}">
            @error('quantity')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="quantity">Перегляди</label>
            <input type="number" class="form-control  @error('views') is-invalid @enderror" id="views" name="views" min="0" value="{{ $post->views }}">
            @error('views')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="tags">Теги</label>
            <select name="tags[]" id="tags" class="select2" multiple="multiple"
                    data-placeholder="Вибір тегу" style="width: 100%;">
                @foreach($tags as $k => $v)
                    <option value="{{ $k }}" @if(in_array($k, $post->tags->pluck('id')->all())) selected @endif>{{ $v }}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group mb-3">
            <label for="category_id">Категория</label>
            <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                @foreach($categories as $k => $v)
                    <option value="{{ $k }}" @if($k == $post->category_id) selected @endif>{{ $v }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="image">Зображення</label>
            <input type="file" class="form-control-file  @error('image') is-invalid @enderror" id="image" name="image">
            @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Збeрегти
@endsection
