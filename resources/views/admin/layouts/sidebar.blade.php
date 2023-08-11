<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">








            <div class="sb-sidenav-menu-heading">Основне</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePosts" aria-expanded="false" aria-controls="collapsePosts">
                <div class="sb-nav-link-icon"><i class="fas fa-pencil-alt"></i></div>
                Пости
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePosts" aria-labelledby="headingPosts" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <!-- Додайте посилання для ваших постів тут -->
                    <a class="nav-link" href="{{route('post.index')}}">Всі пости</a>
                    <a class="nav-link" href="{{route('post.create')}}">Додати пост</a>
                </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTags" aria-expanded="false" aria-controls="collapseTags">
                <div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>
                Теги
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseTags" aria-labelledby="headingTags" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <!-- Додайте посилання для ваших тегів тут -->
                    <a class="nav-link" href="{{route('tags.index')}}">Всі теги</a>
                    <a class="nav-link" href="{{route('tags.create')}}">Додати тег</a>
                </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCategories" aria-expanded="false" aria-controls="collapseCategories">
                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                Категорії
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseCategories" aria-labelledby="headingCategories" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <!-- Додайте посилання для ваших категорій тут -->
                    <a class="nav-link" href="{{route('category.index')}}">Всі категорії</a>
                    <a class="nav-link" href="{{route('category.create')}}">Додати категорію</a>
                </nav>
            </div>











                    <div class="sb-sidenav-menu-heading">Addons</div>
            <a class="nav-link" href="charts.html">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Charts
            </a>
            <a class="nav-link" href="tables.html">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Tables
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Start Bootstrap
    </div>
</nav>
