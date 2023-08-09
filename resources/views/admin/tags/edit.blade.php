@extends('admin.layouts.layouts')

@section('content')
    <h2 class="mb-3">Редагувати Тег</h2>
    <form action="{{ route('tags.update', ['tag' => $tag->slug]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="name">Назва</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $tag->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Збeрегти
@endsection
