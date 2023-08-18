
@section('head')
<header class="bg-dark py-5">
    <h1>Фільтр сортування продуктів</h1>
    <form action="{{route('home')}}" method="get">

        <label for="categories">За категоріями:</label>
        <select id="categories" name="category_id">
            @foreach($categories as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
        </select>

        <label for="tags">За тегами:</label>
        <select id="tags" name="tags[]" multiple>
            @foreach($Tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>



        <label for="minPrice">Мінімальна ціна:</label>
        <input type="number" id="minPrice" name="minPrice" value="{{ request('minPrice') }}" maxlength="5">

        <label for="maxPrice">Максимальна ціна:</label>
        <input type="number" id="maxPrice" name="maxPrice" value="{{ request('maxPrice') }}" maxlength="5">


        <div style="margin-top: 10px;">
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</header>

@endsection
