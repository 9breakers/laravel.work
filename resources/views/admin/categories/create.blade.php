@extends('admin.layouts.layouts')

@section('content')

    <h2 class="mt-4">Додавання категорії</h2>

    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="name">Назва</label>
            <input type="text" class="form-control" id="name" name="name" >
        </div>

        <button type="submit" class="btn btn-primary">Додати</button>
    </form>
@endsection
