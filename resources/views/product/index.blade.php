@extends('layout')

@section('content')
    <section class="products__section">
        <div class="container">
            <div class="products__categories">
                <a href="{{ route('products') }}" class="btn-main-small">Все</a>
                @foreach($categories as $category)
                    <a href="{{ route('products', ['category_id' => $category->id]) }}" class="btn-main-small">{{ $category->title }}</a>
                @endforeach
            </div>
            <div class="products">
                @foreach($products as $product)
                    <div class="products__block">
                        <img src="{{ $product->photo_url }}" alt="{{ $product->title }}">
                        <div class="products__info">
                            <h5>{{ $product->title }}</h5>
                            <div class="products__tags">
                                @foreach($product->tags as $tag)
                                    <p>{{ $tag->title }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
