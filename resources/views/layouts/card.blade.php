<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <img src="http://laravel-diplom-1.rdavydov.ru/storage/products/iphone_x.jpg" alt="iPhone X 64GB">
        <div class="caption">
            <h3>{{$product->name}}</h3>
            <h6>{{ $product->category->name}}</h6>
            <p>{{$product->price}}</p>
            <p>
                <form action="{{ route('basket-add', $product) }}" method="POST">
                    <button type="submit" class="btn btn-primary" role="button">В корзину</button>
                    <a href="{{ route('product', [isset($category) ? $category->code : $product->category->code, $product->code]) }}" class="btn btn-default" role="button">Подробнее</a>
                    @csrf
                </form>
            </p>
        </div>
    </div>
</div>