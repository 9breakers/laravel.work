@extends('admin.layouts.layouts')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Всі категорії</h2>
                </div>

                <div class="card-body">
                    <a href="{{ route('tags.create') }}" class="btn btn-primary mb-3">Додати категорію</a>

                    @if (count($tags))
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th style="width: 30px">#</th>
                                    <th>Назва</th>
                                    <th>Slug</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->id }}</td>
                                        <td>{{ $tag->name }}</td>
                                        <td>{{ $tag->slug }}</td>
                                        <td>


                                            <a href="{{ route('tags.edit', ['tag' => $tag->slug]) }}" class="btn btn-info btn-sm float-left mr-1">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('tags.destroy', ['tag' => $tag->slug]) }}" method="post" class="float-left">
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
                        <p>Категорій поки нема</p>
                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection
