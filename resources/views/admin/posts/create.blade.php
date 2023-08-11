@extends('admin.layouts.layouts')

@section('content')
    <h2 class="mt-4">Додавання постів</h2>

    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Назва</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror old=" id="name" name="name"  value="{{old('name')}}" >
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Опис</label>
            <textarea class="form-control @error('description') is-invalid @enderror"  id="description" name="description"></textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Ціна</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" min="0" >
            @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="quantity">Кількість</label>
            <input type="number" class="form-control  @error('quantity') is-invalid @enderror " id="quantity" name="quantity" min="0" >
            @error('quantity')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="tags">Теги</label>
            <select class="form-control tags-select  @error('tags') is-invalid @enderror" id="tags" name="tags[]" multiple>
                @foreach($tags as $k => $v)
                    <option value="{{ $k }}">{{ $v }}</option>
                @endforeach
            </select>
            @error('tags')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="category_id">Категорія</label>
            <select class="form-control" id="category_id" name="category_id" >
                <option value="">-- Оберіть категорію --</option>
                @foreach($categories as $k => $v)
                    <option value="{{ $k }}">{{ $v }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="image">Зображення</label>
            <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image" >
            @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Додати</button>
    </form>
@endsection
