

<header class="bg-dark py-5">
    <h1>Фільтр сортування продуктів</h1>
    <form id="productFilterForm">

        <label for="categories">За категоріями:</label>
        <select id="categories" name="categories">
            <option value="all">Всі категорії</option>

            @foreach($Categories as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
        </select>

        <label for="tags">За тегами:</label>
        <select id="tags" name="tags[]" multiple>
            @foreach($Tags as $tag)
                <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
        </select>

        <label for="priceRange">Фільтр за ціною:</label>
        <input type="range" id="minPrice" name="minPrice" min="0" max="1000" step="10" value="100">
        <span id="minPriceValue">Від $100</span>
        <input type="range" id="maxPrice" name="maxPrice" min="0" max="1000" step="10" value="500">
        <span id="maxPriceValue"> До $500</span>

    </form>
    <button type="button" id="applyFilter">Застосувати фільтр сортування</button>
</header>
