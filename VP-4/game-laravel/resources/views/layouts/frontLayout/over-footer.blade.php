<div class="content-bottom">
    <div class="line"></div>
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">Посмотрите наши товары</div>
        </div>
    </div>
    <div class="content-main__container">
        <div class="products-columns">
            @foreach($productsRandom as $prod)
                <div class="products-columns__item">
                    <div class="products-columns__item__title-product">
                        <a href="{{ asset('/products/product/'. $prod->id) }}" class="products-columns__item__title-product__link">{{ $prod->product_name }}</a>
                    </div>
                    <div class="products-columns__item__thumbnail">
                        <a href="{{ asset('/products/product/'. $prod->id) }}" class="products-columns__item__thumbnail__link">
                            <img src="{{ asset('img/products/standard/' . $prod->image) }}" alt="Preview-image" class="products-columns__item__thumbnail__img">
                        </a>
                    </div>
                    <div class="products-columns__item__description">
                        <span class="products-price">{{ $prod->price }} руб</span>
                        <a href="{{ asset('/products/product/'. $prod->id) }}" class="btn btn-blue">Купить</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
