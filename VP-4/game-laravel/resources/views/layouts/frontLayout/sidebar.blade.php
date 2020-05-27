<div class="sidebar">
    <div class="sidebar-item">
        <div class="sidebar-item__title"><a class="sidebar-item__title_block" href="{{ asset('/') }}">Категории</a> </div>
        <div class="sidebar-item__content">
            <ul class="sidebar-category">
                @foreach($categories as $category)
                    <li class="sidebar-category__item">
                        <a href="{{ asset('categories/'. $category->url) }}" class="sidebar-category__item__link">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="sidebar-item">
        <div class="sidebar-item__title">Последние новости</div>
        <div class="sidebar-item__content">
            @foreach($news as $article)
            <div class="sidebar-news">
                <div class="sidebar-news__item">
                    <div class="sidebar-news__item__preview-news">
                        <img src="{{ asset('/img/news/small/'.$article->news_image) }}" alt="image-new" class="sidebar-new__item__preview-new__image">
                    </div>
                    <div class="sidebar-news__item__title-news">
                        <a href="{{ asset('/news/article/'.$article->id) }}" class="sidebar-news__item__title-news__link">{{ $article->news_name }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
